<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function submit(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/v2/payment_requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array('Authorization: Bearer y70kak2K0Rg7J4PAL8sdW0MutnGJEl'));

        $payload = Array(
        'purpose' => 'FIFA 16',
        'amount' => '2500',
        'buyer_name' => 'John Doe',
        'email' => 'foo@example.com',
        'phone' => '9999999999',
        'redirect_url' => 'http://www.example.com/redirect/',
        'send_email' => 'True',
        'allow_repeated_payments' => 'False',
        );

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        print_r($payload);

    }
}
