<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index()
    {
        return redirect()->to('/bayar/qr');
    }

    public function manual()
    {
        return view('bayar.manual');
    }

    public function qr()
    {
        return view('bayar.qr');
    }

    public function konfirmasi(Request $request)
    {
        if ($request->method() != 'POST' && !old('payment_code'))
            return redirect()->to('/bayar');

        if ($request->method() == 'POST')
            Validator::make($request->all(), [
                'payment_code' => [
                    'required',
                    function (string $attribute, string $value, Closure $fail) {
                        $payment = Payment::where(['payment_code' => $value])
                            ->where('status', '!=', "SUCCESS")->first();
                        if (!$payment) {
                            $fail("Kode pembayaran tidak ditemukan");
                        }
                    },
                ],
            ], [
                'required' => 'Harus di isi',
            ])->validate();

        $payment_code = $request->payment_code ?? old('payment_code');

        $payment = Payment::select(['amount', 'payment_code', 'to_account_id'])->where(['payment_code' => $payment_code])->first();
        $customer = Customer::select(['name', 'photo'])->where(['user_id' => $payment->to_account_id])->first();

        return view('bayar.konfirmasi', ['customer' => $customer, 'payment' => $payment]);
    }

    public function pin(Request $request)
    {
        if ($request->method() != 'POST' && !old('pin') && !old('payment_code'))
            return redirect()->to('/bayar');

        $validator = Validator::make($request->all(), [
            'payment_code' => [
                function (string $attribute, string $value, Closure $fail) {
                    $payment = Payment::where(['payment_code' => $value])->first();
                    $user = Auth::user();
                    if ($user->balance < $payment->amount) {
                        $fail("Saldo tidak cukup");
                    }
                },
            ],
        ], [
            'required' => 'Harus di isi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput([
                'payment_code' => $request->payment_code,
            ])->withErrors(['payment_code' => 'Saldo tidak cukup']);
        }

        return view('bayar.pin', ['payment_code' => $request->payment_code]);
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
                'payment_code' => $request->payment_code,
            ])->withErrors(['pin' => 'PIN Salah']);
        }
        DB::beginTransaction();


        $user = Auth::user();
        $payment = Payment::where(['payment_code' => $request->payment_code])->first();
        $payment->from_account_id = $user->id;
        $payment->status = 'SUCCESS';
        $paymentSaved = $payment->save();

        $user->balance -= $payment->amount;
        $userSaved = $user->save();

        $userDest = User::where(['id' => $payment->to_account_id])->first();

        if ($paymentSaved && $userSaved) {
            $callbackUrl = $userDest->callback_url_success;
            $data = [
                'status' => 'success',
                'referral_id' => $payment->referral_id,
            ];

            Http::post($callbackUrl, $data);
            DB::commit();
            return redirect('bayar/berhasil');
        } else {
            $callbackUrl = $userDest->callback_url_failed;
            $data = [
                'status' => 'failed',
                'referral_id' => $payment->referral_id,
            ];

            Http::post($callbackUrl, $data);
            DB::rollBack();
            return redirect()->back()->with('error', 'Sedang terjadi kesalahan');
        }
    }

    public function berhasil()
    {
        return view('bayar.berhasil');
    }
}
