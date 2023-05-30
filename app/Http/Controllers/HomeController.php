<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $customer = Customer::select(['name'])->where(['user_id' => $user->id])->first();

        $customerData = (object)[
            'name' => $customer->name,
            'balance' => $user->balance
        ];

        $transactions = Transaction::select([
            'amount',
            'created_at',
            DB::raw('"transfer" as type'),
            DB::raw('IF(from_account_id = "' . $user->id . '", "IN", IF(to_account_id = "' . $user->id . '", "OUT", "")) as status'),
            DB::raw("DATE_FORMAT(created_at, '%d %M %Y') AS date"),
            DB::raw("DATE_FORMAT(created_at, '%H:%i') AS time")
        ])
            ->where('from_account_id', $user->id)
            ->orWhere('to_account_id', $user->id)
            ->limit(3)
            ->orderBy('created_at', 'DESC')
            ->get();


        return view('homepage', ['customer' => $customerData, 'transactions' => $transactions]);
    }
}
