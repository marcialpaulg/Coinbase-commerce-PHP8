<?php

namespace MarcialPaulG\Coinbase\Utils;

use MarcialPaulG\Coinbase\ApiRequest;
use MarcialPaulG\Coinbase\Checkout as CoinbaseCheckout;
use MarcialPaulG\Coinbase\UpdateCheckout;

trait Checkout
{
    public function listCheckouts(): array
    {
        $request = new ApiRequest('GET', CoinbaseCheckout::RESOURCE_URI);

        return $this->request($request);
    }

    public function getCheckout(string $checkout_id): array
    {
        $request = new ApiRequest('GET', CoinbaseCheckout::RESOURCE_URI . "/{$checkout_id}");

        return $this->request($request);
    }

    public function createCheckout(...$args): array
    {
        $request = new CoinbaseCheckout(...$args);

        return $this->request($request);
    }

    public function updateCheckout(UpdateCheckout $update_checkout): array
    {
        return $this->request($update_checkout);
    }

    public function deleteCheckout(string $checkout_id): array
    {
        $request = new ApiRequest('DELETE', CoinbaseCheckout::RESOURCE_URI . "/{$checkout_id}");

        return $this->request($request);
    }
}
