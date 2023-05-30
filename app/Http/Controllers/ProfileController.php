<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $customer = Customer::where(['user_id' => $user->id])->first();

        $customerData = (object)[
            'name' => $customer->name,
            'photo' => $customer->photo,
            'email' => $customer->email,
            'phone_number' => $customer->phone_number
        ];

        return view('profile.profil', ['customer' => $customerData]);
    }
}
