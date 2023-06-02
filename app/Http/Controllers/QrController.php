<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $customer = Customer::select('phone_number')->where(['user_id' => $user->id])->first();
        $encrytPhone = Crypt::encryptString($customer->phone_number);
        $qrCode = QrCode::size(250)->generate($encrytPhone);

        return view('qr.index', ['qrCode' => $qrCode]);
    }
}
