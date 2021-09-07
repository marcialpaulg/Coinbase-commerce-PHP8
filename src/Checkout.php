<?php

namespace MarcialPaulG\Coinbase;

use MarcialPaulG\Coinbase\Exceptions\InputException;
use MarcialPaulG\Coinbase\Interfaces\ApiRequest;
use MarcialPaulG\Coinbase\Interfaces\Checkout as InterfaceCheckout;

class Checkout implements InterfaceCheckout, ApiRequest
{

    public array|null $local_price = null;

    public function __construct(
        public string $name,

        public string $description,

        public string $pricing_type = 'no_price',

        public string|null $amount = null,

        public string|null $currency = null,

        public array|null $requested_info = null,


    ) {

        if (!in_array($this->pricing_type, [
            static::NO_PRICE,
            static::FIXED_PRICE
        ])) {

            throw new InputException('Checkout request error: [' . static::NO_PRICE . ', ' . static::FIXED_PRICE . '] only');
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

        $this->requested_info = collect($this->requested_info)->filter(function ($info) {

            return in_array($info, static::REQUEST_INFO);
        })->toArray();
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
            'requested_info' => $this->requested_info
        ];
    }
}
