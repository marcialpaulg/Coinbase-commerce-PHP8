<?php

namespace MarcialPaulG\Coinbase\Interfaces;

interface ApiRequest
{

    public function getMethod(): string;

    public function getUri(): string;

    public function getData(): array;
}
