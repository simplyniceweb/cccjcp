<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function createCheckoutLink()
    {
        $min = 10;
        $max = 5000;

        $amount = request()->input('amount');

        if ($amount > $max || $amount < $min) {
            return response()->json(['message' => 'Amount is either lower than minimum or higher than maximum.']);
        }

        $user = Auth::user();
        $donation = new Donation();
        $donation->amount = $amount;
        $donation->account_id = $user->account_id;
        $donation->currency = "PHP";
        $donation->save();

        $reference = $donation->id . "-" . uniqid();
        $donation->reference_number = $reference;
        $donation->save();

        $checkout_url = "https://pg.paymaya.com/checkout/v1/checkouts";
        $pk = "pk-wmsYQGr8whqDYNnNGWKiAveqCUJ9KtBCwzy81wQrlU0";
        $sk = "sk-rYKeHqvb5L7ovpvYXFjM7wlLrIZglk335HjhOyXL7wP";
        $body = [
            "totalAmount" => ["value" => $amount, "currency" => "PHP"],
            "requestReferenceNumber" => $reference
        ];

        $client = new Client();
        $response = $client->request('POST', $checkout_url, [
            'body' => json_encode($body, JSON_NUMERIC_CHECK),
            'headers' => [
                'accept' => 'application/json',
                'authorization' => 'Basic '. base64_encode("$pk:$sk"),
                'content-type' => 'application/json'
            ],
        ]);

        return response()->json(['data' => $response->getBody()->getContents()]);
    }
    public function success()
    {
        $donation = DB::table('donations')->where('id', request()->input('requestReferenceNumber'))->first();
        
        if (!empty($donation)) {
            $amount = $donation->amount;
            $account_id = $donation->account_id;

            $logged = DB::table('char')->where('account_id', $account_id)->where('online', 1);

            if ($logged->count()) {
                $char = $logged->first();

                DB::table('cp_commands')->insert([
                    'command' => '@kick '. $char->name,
                    'account_id' => $account_id,
                    'done' => 0
                ]);

                sleep(3);
            }

            $cashpoints = DB::table('acc_reg_num')->where('account_id', $account_id)->where('key', '#CASHPOINTS')->limit(1);
            if(!empty($cashpoints)) {
                $cashdata = $cashpoints->get();
                $amount = ($cashdata[0]->value + $amount);
                $cashpoints->update(['value' => $amount]);
            } else {
                DB::table('acc_reg_num')->insert([
                    'account_id' => $account_id,
                    'key' => '#CASHPOINTS',
                    'index' => 0,
                    'value' => $amount
                ]);
            }
        }

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
