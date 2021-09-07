<?php

require '../vendor/autoload.php';

use MarcialPaulG\Coinbase\Coinbase;
use MarcialPaulG\Coinbase\Exceptions\InvalidRequestException;
use MarcialPaulG\Coinbase\Exceptions\RateLimitExceededException;

$api_key = 'YOUR_API_KEY';

$throw_exceptions = true;

$coinbase = new Coinbase($api_key, $throw_exceptions);

////////////////////////////////////////////////////////////////////////////////

try {

    $data = $coinbase->listEvents();
} catch (InvalidRequestException | RateLimitExceededException $e) {

    echo $e->getMessage();
}
