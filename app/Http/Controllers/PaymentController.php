<?php

namespace App\Http\Controllers;

use App\Services\PayPalService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {

        $rules = [
            'value' => ['required', 'numeric', 'min:5'],
            'currency' => ['required', 'exists:currencies,iso'],
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
        ];


        $request->validate($rules);

        //Inject Class and create and instance of that class
        $paymentPlatform = resolve(PayPalService::class);

        return $paymentPlatform->handlePayment($request);

    }

    public function approval()
    {
        $paymentPlatform = resolve(PayPalService::class);
        
        return $paymentPlatform->handleApproval();
    }

    public function cancelled()
    {
        
    }

}
