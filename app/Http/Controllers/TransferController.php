<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TransferController extends Controller
{
    public function index()
    {
        return redirect()->to('/transfer/qr');
    }

    public function manual()
    {
        return view('transfer.manual');
    }

    public function qr()
    {
        return view('transfer.qr');
    }

    public function nominal(Request $request)
    {
        if ($request->method() != 'POST' && !old('phone_number'))
            return redirect()->to('/transfer');

        if ($request->method() == 'POST')
            Validator::make($request->all(), [
                'phone_number' => [
                    'required',
                    function (string $attribute, string $value, Closure $fail) use ($request) {
                        $processedValue = $request->type == 'qr' ? Crypt::decryptString($value) : $value;
                        $customer = Customer::where(['phone_number' => $processedValue])->first();
                        if (!$customer) {
                            $fail("Tujuan tidak ditemukan");
                        }
                    },
                ],
            ], [
                'required' => 'Harus di isi',
            ])->validate();

        $phone_number = $request->phone_number ?? old('phone_number');
        $phone_number = $request->type == 'qr' ? Crypt::decryptString($phone_number) : $phone_number;
        $customer = Customer::select(['name', 'phone_number', 'photo'])->where(['phone_number' => $phone_number])->first();

        return view('transfer.nominal', ['customer' => $customer]);
    }

    public function konfirmasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nominal' => [
                'required',
                function (string $attribute, string $value, Closure $fail) {
                    $user = Auth::user();
                    if ($user->balance < $value) {
                        $fail("Saldo tidak cukup");
                    }
                },
            ]
        ], [
            'required' => 'Harus di isi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput([
                'phone_number' => $request->phone_number,
            ])->withErrors(['nominal' => 'Saldo tidak cukup']);
        }

        $customer = Customer::select(['name', 'phone_number', 'photo'])->where(['phone_number' => $request->phone_number])->first();
        $nominal = $request->nominal;

        return view('transfer.konfirmasi', ['customer' => $customer, 'nominal' => $nominal]);
    }

    public function pin(Request $request)
    {
        if ($request->method() != 'POST' && !old('phone_number') && !old('nominal') && !old('description'))
            return redirect()->to('/transfer');

        $customer = Customer::select(['name', 'phone_number', 'photo'])->where(['phone_number' => $request->phone_number])->first();
        $nominal = $request->nominal;
        $description = $request->deskripsi;

        return view('transfer.pin', ['customer' => $customer, 'nominal' => $nominal, 'description' => $description]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pin' => [
                'required',
                function (string $attribute, string $value, Closure $fail) use ($request) {
                    $user = Auth::user();
                    if (!Hash::check($request->pin, $user->password)) {
                        $fail("PIN Salah");
                    }
                },
            ],
        ], [
            'required' => 'Harus di isi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput([
                'phone_number' => $request->phone_number,
                'nominal' => $request->nominal,
                'description' => $request->description
            ])->withErrors(['pin' => 'PIN Salah']);
        }

        $user = Auth::user();
        $customer = Customer::select(['user_id'])->where(['phone_number' => $request->phone_number])->first();
        $nominal = $request->nominal;
        $description = $request->deskripsi;
        DB::beginTransaction();

        $transaction = new Transaction();
        $transaction->from_account_id = $user->id;
        $transaction->to_account_id = $customer->user_id;
        $transaction->amount = $nominal;
        $transaction->description = $description;
        $transactionSaved = $transaction->save();

        $userDest = User::where(['id' => $customer->user_id])->first();
        $userDest->balance += $nominal;
        $userDestSaved = $userDest->save();

        $user->balance -= $nominal;
        $userSaved = $user->save();

        if ($transactionSaved && $userDestSaved && $userSaved) {
            DB::commit();
            return redirect('transfer/berhasil');
        } else {
            DB::rollBack();
            return redirect()->back()->with('error', 'Sedang terjadi kesalahan');
        }
    }

    public function berhasil()
    {
        return view('transfer.berhasil');
    }
}
