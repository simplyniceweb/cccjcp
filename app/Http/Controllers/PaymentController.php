<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function success()
    {
        $user = Auth::user();

        // {"data":{"id":"3fd51653-73d3-489a-a4fa-71a028fcab30","amount":567,"currency":"PHP","status":"PAYMENT_SUCCESS","requestReferenceNumber":"13b14528-ca47-4068-93a6-51e2e1c6cc8a"}}
        
        $amount = request()->input('amount');
        
        $donation = new Donation();
        $donation->account_id = $user->account_id;
        $donation->payment_id = request()->input('id');
        $donation->amount = $amount;
        $donation->currency = request()->input('currency');
        $donation->status = request()->input('status');
        $donation->reference_number = request()->input('requestReferenceNumber');
        $donation->save();

        $cashpoints = DB::table('acc_reg_num')->where('account_id', $user->account_id)->where('key', '#CASHPOINTS')->first();
        if($cashpoints) {
            $amount = ($cashpoints->value + $amount);
            $cashpoints->update([
                'value' => $amount
            ]);
        } else {
            DB::table('acc_reg_num')->insert([
                'account_id' => $user->account_id,
                'key' => '#CASHPOINTS',
                'index' => 0,
                'value' => $amount
            ]);
        }

        return redirect('/')->with('message', 'Hi, ' . $user->userid . '! Your cashpoints value now is amounting '. $amount .'. Thank you and enjoy!');
    }

    public function failure()
    {
        return response()->json(['message' => 'Failed!']);
    }

    public function cancel()
    {
        return response()->json(['message' => 'Cancelled!']);
    }
}
