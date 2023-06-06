<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $bearerToken = $request->header('Authorization');
        $token = str_replace('Bearer ', '', $bearerToken);

        $user = User::where(['app_key' => $token])->first();

        DB::beginTransaction();
        $payment = new Payment();

        // add id
        $payment->to_account_id = $user->id;
        $payment->amount = $request->nominal;
        $payment->referral_id = $request->referral_id;
        $payment->payment_code = Str::random(8);
        $paymentSaved = $payment->save();

        if ($paymentSaved) {
            DB::commit();
            return response()->json([
                'msg' => 'Success',
                'data' => [
                    'kode_pembayaran' => $payment->payment_code,
                ]
            ]);
        } else {
            DB::rollback();
            return response()->json([
                'msg' => 'Error',
                'data' => 'Something went wrong'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
