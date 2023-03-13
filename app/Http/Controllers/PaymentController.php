<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function success()
    {
        $user = Auth::user();

        // {"data":{"id":"3fd51653-73d3-489a-a4fa-71a028fcab30","amount":567,"currency":"PHP","status":"PAYMENT_SUCCESS","requestReferenceNumber":"13b14528-ca47-4068-93a6-51e2e1c6cc8a"}}
        $donation = new Donation();
        $donation->account_id = $user->account_id;
        $donation->payment_id = request()->input('id');
        $donation->amount = request()->input('amount');
        $donation->currency = request()->input('currency');
        $donation->status = request()->input('status');
        $donation->reference_number = request()->input('requestReferenceNumber');
        $donation->save();



        return response()->json(['data' => request()->all()]);
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
