<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        $is_partner = $user->account_type == 'partner';


        if ($is_partner) {
            return view('admin.profile.index', ['customer' => $customerData]);
        } else {
            return view('profile.index', ['customer' => $customerData]);
        }
    }

    public function pengaturan()
    {
        $user = Auth::user();
        $is_partner = $user->account_type == 'partner';

        if ($is_partner) {
            $data = (object)[
                "app_key" => $user->app_key,
                "callback_url_success" => $user->callback_url_success,
                "callback_url_failed" => $user->callback_url_failed,
            ];

            return view('admin.profile.pengaturan', ["data" => $data]);
        } else {
            return redirect('/profile');
        }
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'callback_url_success' => 'required',
            'callback_url_failed' => 'required',
        ], ['required' => 'Harus di isi'])->validate();

        DB::beginTransaction();

        $user = Auth::user();
        $user->callback_url_success = $request->callback_url_success;
        $user->callback_url_failed = $request->callback_url_failed;
        $userSaved = $user->save();

        if ($userSaved) {
            DB::commit();
            return redirect('/profile/pengaturan')->with('success', "Berhasil menyimpan data");
        } else {
            DB::rollback();
            return redirect('/profile/pengaturan')->with('error', "Gagal menyimpan data");
        }
    }
}
