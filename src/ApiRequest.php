<?php

namespace MarcialPaulG\Coinbase;

use MarcialPaulG\Coinbase\Interfaces\ApiRequest as ApiRequestInterface;

class ApiRequest implements ApiRequestInterface
{

    public function __construct(public string $method, public string $uri, public array $params = [])
    {
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getData(): array
    {
        return $this->params;
    }
}
