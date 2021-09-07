<?php

namespace MarcialPaulG\Coinbase\Utils;

use MarcialPaulG\Coinbase\Exceptions\InvalidRequestException;
use MarcialPaulG\Coinbase\Exceptions\RateLimitExceededException;
use MarcialPaulG\Coinbase\Interfaces\ApiRequest as InterfaceApiRequest;

trait ApiRequest
{

    public function request(InterfaceApiRequest $apiRequest): array
    {

        $uri = ltrim($apiRequest->getUri(), '/');

        $options = [];

        $params = $apiRequest->getData();

        if (!empty($params)) {

            $options['json'] = $params;
        }

        $response = $this->http_client_handler->request(
            $apiRequest->getMethod(),
            $uri,
            $options
        );

        $contents = $response->getBody()->getContents();

        if ($this->throw_exceptions) {

            match ($response->getStatusCode()) {

                400 => throw new InvalidRequestException($contents),

                429 => throw new RateLimitExceededException($contents),

                default => null
            };
        }



        return json_decode($contents, true);
    }
}
