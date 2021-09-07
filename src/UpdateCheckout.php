<?php

namespace MarcialPaulG\Coinbase;

use MarcialPaulG\Coinbase\Interfaces\ApiRequest;
use MarcialPaulG\Coinbase\Interfaces\Checkout;

class UpdateCheckout implements Checkout, ApiRequest
{

    public function __construct(
        public string $id,
        public string|null $name,
        public string|null $description,
        public array|null $local_price,
        public array|null $requested_info,
    ) {
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return static::RESOURCE_URI . "/{$this->id}";
    }

    public function getData(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'local_price' => $this->local_price,
            'requested_info' => $this->requested_info
        ];
    }
}
