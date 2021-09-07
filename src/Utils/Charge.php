<?php

namespace MarcialPaulG\Coinbase\Utils;

use MarcialPaulG\Coinbase\ApiRequest;
use MarcialPaulG\Coinbase\Charge as CoinbaseCharge;

trait Charge
{
    public function listCharges(): array
    {
        $request = new ApiRequest('GET', CoinbaseCharge::RESOURCE_URI);

        return $this->request($request);
    }

    public function getCharge(string $charge_code_id): array
    {
        $request = new ApiRequest('GET', CoinbaseCharge::RESOURCE_URI . "/{$charge_code_id}");

        return $this->request($request);
    }

    public function createCharge(...$args): array
    {
        $request = new CoinbaseCharge(...$args);

        return $this->request($request);
    }

    public function cancelCharge(string $charge_code_id): array
    {
        $request = new ApiRequest('POST', CoinbaseCharge::RESOURCE_URI . "/{$charge_code_id}/cancel");

        return $this->request($request);
    }

    public function resolveCharge(string $charge_code_id): array
    {
        $request = new ApiRequest('POST', CoinbaseCharge::RESOURCE_URI . "/{$charge_code_id}/resolve");

        return $this->request($request);
    }
}
