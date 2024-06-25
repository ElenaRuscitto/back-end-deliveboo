<?php

namespace App\Http\Controllers;
use Braintree\Gateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $gateway;

    public function __construct(){

        $this->gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey'),
        ]);
    }

    public function generateToken()
    {

        $clientToken = $this->gateway->clientToken()->generate();

        return response()->json(['token' => $clientToken]);
    }

    public function processPayment(Request $request)
    {

        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;
        // $orderDetails = $request->order_details;
        // dump($request);
        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {
            return response()->json(['success' => true, 'transaction_id' => $result->transaction->id]);
        } else {
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
}
