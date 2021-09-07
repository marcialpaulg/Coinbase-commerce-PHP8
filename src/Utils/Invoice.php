<?php

namespace MarcialPaulG\Coinbase\Utils;

use MarcialPaulG\Coinbase\ApiRequest;
use MarcialPaulG\Coinbase\Invoice as CoinbaseInvoice;

trait Invoice
{
    public function listInvoices(): array
    {
        $request = new ApiRequest('GET', CoinbaseInvoice::RESOURCE_URI);

        return $this->request($request);
    }

    public function getInvoice(string $invoice_code_id): array
    {
        $request = new ApiRequest('GET', CoinbaseInvoice::RESOURCE_URI . "/{$invoice_code_id}");

        return $this->request($request);
    }

    public function createInvoice(...$args): array
    {
        $request = new CoinbaseInvoice(...$args);

        return $this->request($request);
    }

    public function voidInvoice(string $invoice_code_id): array
    {
        $request = new ApiRequest('PUT', CoinbaseInvoice::RESOURCE_URI . "/{$invoice_code_id}/void");

        return $this->request($request);
    }

    public function resolveInvoice(string $invoice_code_id): array
    {
        $request = new ApiRequest('POST', CoinbaseInvoice::RESOURCE_URI . "/{$invoice_code_id}/resolve");

        return $this->request($request);
    }
}
