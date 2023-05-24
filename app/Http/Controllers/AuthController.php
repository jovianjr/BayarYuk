<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        Validator::make($request->all(), [
            'phone_number' => 'required|numeric',
        ], [
            'numeric' => 'Harus berupa angka.',
            'required' => 'Harus di isi.',
        ])->validate();

        $phone_number = $request->input('phone_number');

        $customer = Customer::where('phone_number', $phone_number)->first();

        $account = Account::where('customer_id', $customer->id)->first();

        return response()->json(['data' => $account, 'status' => 200], 200);
    }

    public function register(Request $request)
    {

        $password = $request->input('password');

        $phone_number = $request->input('phone_number');
        $email = $request->input('email');
        $name = $request->input('name');
        $address = $request->input('address');
        $birth_date = $request->input('birth_date');
        $birth_place = $request->input('birth_place');

        $customer = Customer::create([
            'phone_number' => $phone_number,
            'email' => $email,
            'name' => $name,
            'address' => $address,
            'birth_date' => $birth_date,
            'birth_place' => $birth_place,
        ]);

        $account = Account::create(['password' => bcrypt($password)]);
    }
}
