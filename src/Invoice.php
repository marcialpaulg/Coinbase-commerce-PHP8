<?php

namespace MarcialPaulG\Coinbase;

use MarcialPaulG\Coinbase\Interfaces\ApiRequest;
use MarcialPaulG\Coinbase\Interfaces\Invoice as InterfaceInvoice;

class Invoice implements InterfaceInvoice, ApiRequest
{
    public array $local_price = [
        'amount' => '0.00',
        'currency' => 'USD'
    ];

    public function __construct(
        public string $business_name,
        public string $customer_email,
        public string $amount,
        public string $currency,
        public string|null $customer_name,
        public string|null $memo,
    ) {

        $this->local_price['amount'] = $this->amount;

        $this->local_price['currency'] = $this->currency;
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
            'business_name' => $this->business_name,
            'customer_email' => $this->customer_email,
            'customer_name' => $this->customer_name,
            'local_price' => $this->local_price,
            'memo' => $this->memo,
        ];
    }
}
