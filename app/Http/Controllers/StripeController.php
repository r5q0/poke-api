<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StripeController extends Controller
{
    public function paymentEUR()
    {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));
        $response = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card', 'paypal', 'ideal', 'bancontact', 'giropay', 'klarna'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'API Key',
                            'images' => ['https://www.svgrepo.com/show/381093/ball-game-poke-sport-sports.svg']
                        ],
                        'unit_amount' => 120,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => 'http://127.0.0.1:8000/succes/'.self::getKey(),
            'cancel_url' => url()->previous(),            
            'metadata' => [ ]
        ]);

        return redirect()->away($response->url);
    }

    

public static function getKey(){
    $apiKey = str::random(32); 
    DB::table('apikeys')->insert([
        'key' => $apiKey,
    ]);
    return $apiKey;
}
   
}
