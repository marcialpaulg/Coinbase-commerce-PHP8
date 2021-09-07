<?php

require '../vendor/autoload.php';

use MarcialPaulG\Coinbase\Coinbase;
use MarcialPaulG\Coinbase\Exceptions\InvalidRequestException;
use MarcialPaulG\Coinbase\Exceptions\RateLimitExceededException;

// Your API KEY
$api_key = 'YOUR_API_KEY';

// throw exception 
$throw_exceptions = true;

$coinbase = new Coinbase($api_key, $throw_exceptions);

////////////////////////////////////////////////////////////////////////////////

$charge_code_id = 'CHARGE_CODE_OR_CHARGE_ID';

try {

    $data = $coinbase->cancelCharge($charge_code_id);
} catch (InvalidRequestException | RateLimitExceededException $e) {

    echo $e->getMessage();
}
