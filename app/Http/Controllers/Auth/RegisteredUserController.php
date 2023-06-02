<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'password' => ['required', 'numeric', 'confirmed'],
            'account_type' => ['required', 'string'],
            'phone_number' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'string', 'max:30']
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'password' => Hash::make($request->password),
                'account_type' => $request->account_type,
                'app_key' => Str::random(32)
            ]);

            $user->customer()->create([
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'name' => $request->name,
                'address' => $request->address,
                'birth_date' => $request->birth_date,
                'birth_place' => $request->birth_place,
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        };

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
