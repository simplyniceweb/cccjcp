<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success()
    {
        return response()->json(['message' => 'Success!']);
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
