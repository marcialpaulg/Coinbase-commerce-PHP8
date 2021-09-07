<?php

namespace MarcialPaulG\Coinbase\Interface;

interface ApiRequest
{

    public function getMethod(): string;

    public function getUri(): string;

    public function getData(): array;
}
