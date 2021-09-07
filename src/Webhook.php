<?php

namespace MarcialPaulG\Coinbase;

use MarcialPaulG\Coinbase\Exceptions\WebhookPayloadException;
use MarcialPaulG\Coinbase\Exceptions\WebhookSignatureException;
use MarcialPaulG\Coinbase\Interfaces\Webhook as InterfaceWebhook;

class Webhook implements InterfaceWebhook
{

    public function __construct(public string $secret_key, public string $payload, public string $signature)
    {
    }

    public function validate()
    {

        $data = json_decode($this->payload, true);

        if (json_last_error() || !isset($data['event'])) {

            throw new WebhookPayloadException('Invalid payload provided.');
        }

        $computedSignature = hash_hmac('sha256', $this->payload, $this->secret_key);

        if (!hash_equals($this->signature, $computedSignature)) {

            throw new WebhookSignatureException('Signature mismatched!');
        }
    }

    public static function httpHeaderName()
    {
        return 'HTTP_' . str_replace('-', '_', strtoupper(static::SIGNATURE_HEADER_NAME));
    }
}
