<?php

namespace MarcialPaulG\Coinbase;

use MarcialPaulG\Coinbase\Exceptions\InputException;
use MarcialPaulG\Coinbase\Interfaces\ApiRequest;
use MarcialPaulG\Coinbase\Interfaces\Charge as InterfaceCharge;

class Charge implements InterfaceCharge, ApiRequest
{

    public array|null $local_price = null;

    public function __construct(
        public string $name,

        public string $description,

        public string $pricing_type = 'no_price',

        public string|null $amount = null,

        public string|null $currency = null,

        public array|null $metadata = null,

        public string|null $redirect_url = null,

        public string|null $cancel_url = null
    ) {

        if (!in_array($this->pricing_type, [
            static::NO_PRICE,
            static::FIXED_PRICE
        ])) {

            throw new InputException('Charge request error: [' . static::NO_PRICE . ', ' . static::FIXED_PRICE . '] only');
        }

        if (empty($this->amount)) {

            $this->pricing_type = static::NO_PRICE;
        } else {

            $this->pricing_type = static::FIXED_PRICE;

            $this->local_price = [
                'amount' => $this->amount,
                'currency' => $this->currency
            ];
        }
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return static::RESOURCE_URI;
    }

    public function getData(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'pricing_type' => $this->pricing_type,
            'local_price' => $this->local_price,
            'metadata' => $this->metadata,
            'redirect_url' => $this->redirect_url,
            'cancel_url' => $this->cancel_url,
        ];
    }
}
