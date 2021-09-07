<?php

namespace MarcialPaulG\Coinbase;

use GuzzleHttp\Client;
use MarcialPaulG\Coinbase\Interfaces\Coinbase as InterfaceCoinbase;
use MarcialPaulG\Coinbase\Utils\ApiRequest;
use MarcialPaulG\Coinbase\Utils\Charge;
use MarcialPaulG\Coinbase\Utils\Checkout;
use MarcialPaulG\Coinbase\Utils\Event;
use MarcialPaulG\Coinbase\Utils\Invoice;

class Coinbase implements InterfaceCoinbase
{

    use ApiRequest;
    use Charge;
    use Checkout;
    use Event;
    use Invoice;

    public Client $http_client_handler;

    public function __construct(public string $api_key, public bool $throw_exceptions = true)
    {

        $this->http_client_handler = new Client([
            'base_uri' => static::BASE_API_URL,
            'headers' => [
                static::API_KEY_HEADER_NAME => $api_key,
                static::API_VERSION_HEADER_NAME => static::API_LATEST_VERSION
            ],
            'http_errors' => false
        ]);
    }
}
