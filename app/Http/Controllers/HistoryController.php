<?php

namespace App\Http\Controllers;

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
            ->orWhere('to_account_id', $user->id)
            ->get();
        return view('riwayat', ['transactions' => $transactions]);
    }


    public function filter(Request $request)
    {
        $user = Auth::user();
        $kategori = $request->input('kategori');
        $waktu = $request->input('waktu');

        $query = Transaction::select([
            'amount',
            'created_at',
            DB::raw('"transfer" as type'),
            DB::raw('IF(from_account_id = "' . $user->id . '", "OUT", IF(to_account_id = "' . $user->id . '", "IN", "")) as status'),
            DB::raw("DATE_FORMAT(created_at, '%d %M %Y') AS date"),
            DB::raw("DATE_FORMAT(created_at, '%H:%i') AS time")
        ]);
        // ->where(function ($query) use ($user) {
        //     $query->where('from_account_id', $user->id)
        //         ->orWhere('to_account_id', $user->id);
        // });

        if ($kategori) {
            if ($kategori == 'OUT') {
                $query->where('from_account_id', $user->id);
            } else if ($kategori == 'IN') {
                $query->where('to_account_id', $user->id);
            } else {
                $transactions = $query->get();
                return view('riwayat', ['transactions' => $transactions]);
            }
        }

        if ($waktu) {
            if ($waktu === 'today') {
                $query->whereDate('created_at', Carbon::today());
            } elseif ($waktu === 'thisweek') {
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            } elseif ($waktu === 'twoweek') {
                $query->whereBetween('created_at', [Carbon::now()->subWeeks(2), Carbon::now()->endOfWeek()]);
            }
        }

        $transactions = $query->get();

        return view('riwayat', ['transactions' => $transactions]);
    }
}
