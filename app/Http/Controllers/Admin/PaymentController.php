<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $payments = Payment::select([
            'amount',
            'payment_code',
            'created_at',
            DB::raw("if(status != '', status,IF(created_at < (CURDATE() - INTERVAL 1 WEEK), 'EXPIRED', 'WAITING')) as status"),
            DB::raw("DATE_FORMAT(created_at, '%d %M %Y') AS date"),
            DB::raw("DATE_FORMAT(created_at, '%H:%i') AS time")
        ])
            ->where(['to_account_id' => $user->id])
            ->orderby('created_at', 'DESC')
            ->get();

        return view('admin.pembayaran.index', ['payments' => $payments]);
    }

    public function add()
    {
        return view('admin.pembayaran.add');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nominal' => "required"
        ], [
            'required' => 'Harus di isi',
        ])->validate();

        DB::beginTransaction();

        $user = Auth::user();
        $payment = new Payment();

        $payment->to_account_id = $user->id;
        $payment->amount = $request->nominal;
        $payment->payment_code = Str::random(8);
        $paymentSaved = $payment->save();

        if ($paymentSaved) {
            DB::commit();
            return redirect('/detail' . '/' . $payment->payment_code);
        } else {
            DB::rollback();
            return redirect()->back()->with('error', 'Sedang terjadi kesalahan');
        }
    }

    public function detail($id)
    {
        $payment = Payment::select(['payment_code'])->where('payment_code', $id)->first();
        $qrCode = QrCode::size(250)->generate($payment->payment_code);

        return view('admin.pembayaran.detail', ['payment' => $payment, 'qrCode' => $qrCode]);
    }
}
