<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $customer = Customer::select(['name'])->where(['user_id' => $user->id])->first();

            $customerData = (object)[
                'name' => $customer->name,
                'balance' => $user->balance
            ];

            $transactions = Transaction::select([
                'amount',
                'created_at',
                DB::raw('"transfer" as type'),
                DB::raw('IF(from_account_id = "' . $user->id . '", "OUT", IF(to_account_id = "' . $user->id . '", "IN", "")) as status'),
                DB::raw("DATE_FORMAT(created_at, '%d %M %Y') AS date"),
                DB::raw("DATE_FORMAT(created_at, '%H:%i') AS time")
            ])
                ->where('from_account_id', $user->id)
                ->orWhere('to_account_id', $user->id);

            $payments = Payment::select([
                'amount',
                'created_at',
                DB::raw('"payment" as type'),
                DB::raw('IF(from_account_id = "' . $user->id . '", "OUT", IF(to_account_id = "' . $user->id . '", "IN", "")) as status'),
                DB::raw("DATE_FORMAT(created_at, '%d %M %Y') AS date"),
                DB::raw("DATE_FORMAT(created_at, '%H:%i') AS time")
            ])
                ->where('from_account_id', $user->id)
                ->orWhere('to_account_id', $user->id);

            $data =  $transactions->union($payments)
                ->limit(3)
                ->orderBy('created_at', 'DESC')
                ->get();

            if ($user->account_type == 'normal') {
                return view('homepage', ['customer' => $customerData, 'transactions' => $data]);
            } else if ($user->account_type == 'partner') {
                return view('admin.homepage', ['customer' => $customerData, 'transactions' => $data]);
            }
        } else {
            return view('welcome');
        }
    }
}
