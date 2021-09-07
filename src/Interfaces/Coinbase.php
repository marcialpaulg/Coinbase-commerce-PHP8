<?php

namespace MarcialPaulG\Coinbase\Interfaces;

interface Coinbase
{
    const BASE_API_URL = 'https://api.commerce.coinbase.com';

    const API_KEY_HEADER_NAME = 'X-CC-Api-Key';

    const API_VERSION_HEADER_NAME = 'X-CC-Version';

    const API_LATEST_VERSION = '2018-03-22';

    const RATE_LIMIT_ERROR_HEADER_CODE = 429;

    public function __construct(string $api_key);

    public function request(ApiRequest $request): array;
}
