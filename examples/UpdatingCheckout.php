<?php

require '../vendor/autoload.php';

use MarcialPaulG\Coinbase\Coinbase;
use MarcialPaulG\Coinbase\Exceptions\InvalidRequestException;
use MarcialPaulG\Coinbase\Exceptions\RateLimitExceededException;
use MarcialPaulG\Coinbase\UpdateCheckout;

$api_key = 'YOUR_API_KEY';

$throw_exceptions = true;

$coinbase = new Coinbase($api_key, $throw_exceptions);

////////////////////////////////////////////////////////////////////////////////

try {


    $checkout_id = 'CHECKOUT_ID_TO_UPDATE';

    $update_checkout = new UpdateCheckout(
        id: $checkout_id,
        name: 'new name',
        description: 'updated description #2',
        local_price: [
            'amount' => '2000',
            'currency' => 'PHP'
        ],
        requested_info: ['name']
    );

    $data = $coinbase->updateCheckout($update_checkout);
} catch (InvalidRequestException | RateLimitExceededException $e) {

    echo $e->getMessage();
}
