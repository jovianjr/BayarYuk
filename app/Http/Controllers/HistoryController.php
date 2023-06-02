<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

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
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('riwayat', ['transactions' => $data]);
    }


    public function filter(Request $request)
    {
        $user = Auth::user();
        $kategori = $request->input('kategori');
        $waktu = $request->input('waktu');

        $transactions = Transaction::select([
            'amount',
            'created_at',
            DB::raw('"transfer" as type'),
            DB::raw('IF(from_account_id = "' . $user->id . '", "OUT", IF(to_account_id = "' . $user->id . '", "IN", "")) as status'),
            DB::raw("DATE_FORMAT(created_at, '%d %M %Y') AS date"),
            DB::raw("DATE_FORMAT(created_at, '%H:%i') AS time"),
            'from_account_id',
            'to_account_id'
        ]);

        $payments = Payment::select([
            'amount',
            'created_at',
            DB::raw('"payment" as type'),
            DB::raw('IF(from_account_id = "' . $user->id . '", "OUT", IF(to_account_id = "' . $user->id . '", "IN", "")) as status'),
            DB::raw("DATE_FORMAT(created_at, '%d %M %Y') AS date"),
            DB::raw("DATE_FORMAT(created_at, '%H:%i') AS time"),
            'from_account_id',
            'to_account_id'
        ]);


        if ($kategori) {
            if ($kategori == 'OUT') {
                $transactions->where('from_account_id', $user->id);
                $payments->where('from_account_id', $user->id);
            } else if ($kategori == 'IN') {
                $transactions->where('to_account_id', $user->id);
                $payments->where('to_account_id', $user->id);
            }
        } else {
            $transactions->where('from_account_id', $user->id)->orWhere('to_account_id', $user->id);
            $payments->where('from_account_id', $user->id)->orWhere('to_account_id', $user->id);
        }

        if ($waktu) {
            if ($waktu === 'today') {
                $transactions->whereDate('created_at', Carbon::today());
                $payments->whereDate('created_at', Carbon::today());
            } elseif ($waktu === 'thisweek') {
                $transactions->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                $payments->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            } elseif ($waktu === 'twoweek') {
                $transactions->whereBetween('created_at', [Carbon::now()->subWeeks(2), Carbon::now()->endOfWeek()]);
                $payments->whereBetween('created_at', [Carbon::now()->subWeeks(2), Carbon::now()->endOfWeek()]);
            }
        }

        $query = $transactions->union($payments);
        $data = $query->get();

        return view('riwayat', ['transactions' => $data]);
    }
}
