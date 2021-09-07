<?php

require '../vendor/autoload.php';

use MarcialPaulG\Coinbase\Charge;
use MarcialPaulG\Coinbase\Coinbase;
use MarcialPaulG\Coinbase\Exceptions\InvalidRequestException;
use MarcialPaulG\Coinbase\Exceptions\RateLimitExceededException;

$api_key = 'YOUR_API_KEY';

$throw_exceptions = true;

$coinbase = new Coinbase($api_key, $throw_exceptions);

////////////////////////////////////////////////////////////////////////////////

try {


    $charge = new Charge(
        name: "The Sovereign Individual",
        description: "Mastering the Transition to the Information Age",
        pricing_type: "fixed_price",
        amount: "100.00",
        currency: "USD",
        metadata: [
            "customer_id" => "id_1005",
            "customer_name" => "Satoshi Nakamoto"
        ],
        redirect_url: "https://charge/completed/page",
        cancel_url: "https://charge/canceled/page"
    );

    $data = $coinbase->request($charge);

    // OR

    $data = $coinbase->createCharge(
        name: "The Sovereign Individual",
        description: "Mastering the Transition to the Information Age",
        pricing_type: "fixed_price",
        amount: "100.00",
        currency: "USD",
        metadata: [
            "customer_id" => "id_1005",
            "customer_name" => "Satoshi Nakamoto"
        ],
        redirect_url: "https://charge/completed/page",
        cancel_url: "https://charge/canceled/page"
    );
} catch (InvalidRequestException | RateLimitExceededException $e) {

    echo $e->getMessage();
}
