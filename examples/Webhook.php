<?php

require '../vendor/autoload.php';

use MarcialPaulG\Coinbase\Exceptions\WebhookPayloadException;
use MarcialPaulG\Coinbase\Exceptions\WebhookSignatureException;
use MarcialPaulG\Coinbase\Webhook;

$secret_key = 'YOU_API_SECRET_KEY';

$payload = trim(file_get_contents('php://input'));

$http_header_signature = $_SERVER[Webhook::httpHeaderName()];

$webhook = new Webhook($secret_key, $payload, $http_header_signature);

try {

    $webhook->validate();
} catch (WebhookPayloadException | WebhookSignatureException $e) {

    die($e->getMessage());
}

// it's safe now to process the payload
// process event