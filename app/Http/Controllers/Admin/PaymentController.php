<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $payments = Payment::where(['to_account_id' => $user->id])->get();

        echo '<pre>';
        print_r($payments);
        die;

        return view('admin.pembayaran.index');
    }
}
