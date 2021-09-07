<?php

require '../vendor/autoload.php';

use MarcialPaulG\Coinbase\Checkout;
use MarcialPaulG\Coinbase\Coinbase;
use MarcialPaulG\Coinbase\Exceptions\InvalidRequestException;
use MarcialPaulG\Coinbase\Exceptions\RateLimitExceededException;

$api_key = 'YOUR_API_KEY';

$throw_exceptions = true;

$coinbase = new Coinbase($api_key, $throw_exceptions);

////////////////////////////////////////////////////////////////////////////////

try {

    $checkout = new Checkout(
        name: "The Sovereign Individual",
        description: "Mastering the Transition to the Information Age",
        pricing_type: "fixed_price",
        amount: "100.00",
        currency: "USD",
        requested_info: ['email', 'name'],
    );

    $data = $coinbase->request($checkout);

    // OR

    $data = $coinbase->createCheckout(
        name: "The Sovereign Individual",
        description: "Mastering the Transition to the Information Age",
        pricing_type: "fixed_price",
        amount: "100.00",
        currency: "USD",
        requested_info: ['email', 'name'],
    );
} catch (InvalidRequestException | RateLimitExceededException $e) {

    echo $e->getMessage();
}
