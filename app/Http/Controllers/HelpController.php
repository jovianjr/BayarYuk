<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HelpController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $customer = Customer::select(['name'])->where(['user_id' => $user->id])->first();

        $customerData = (object)[
            'name' => $customer->name,
        ];

        return view('help', ['customer' => $customerData]);
    }
}
