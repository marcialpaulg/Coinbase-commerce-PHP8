<?php

require '../vendor/autoload.php';

use MarcialPaulG\Coinbase\Coinbase;
use MarcialPaulG\Coinbase\Exceptions\InvalidRequestException;
use MarcialPaulG\Coinbase\Exceptions\RateLimitExceededException;
use MarcialPaulG\Coinbase\Invoice;

$api_key = 'YOUR_API_KEY';

$throw_exceptions = true;

$coinbase = new Coinbase($api_key, $throw_exceptions);

////////////////////////////////////////////////////////////////////////////////

try {


    $invoice = new Invoice(
        business_name: "The Sovereign Individual",
        customer_email: "qweqwe@gmaiol.com",
        amount: "100.00",
        currency: "USD",
        customer_name: "Mars",
        memo: "for test"
    );

    $data = $coinbase->request($invoice);

    // OR

    $data = $coinbase->createInvoice(
        business_name: "The Sovereign Individual",
        customer_email: "qweqwe@gmaiol.com",
        amount: "100.00",
        currency: "USD",
        customer_name: "Mars",
        memo: "for test"
    );
} catch (InvalidRequestException | RateLimitExceededException $e) {

    echo $e->getMessage();
}
