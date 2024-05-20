<?php

namespace LucasFidelis\MercadoLivreSdk\Managers;

use LucasFidelis\MercadoLivreSdk\Client\Client;

abstract class Manager
{
    public function __construct(
        protected readonly Client $client
    ) {
    }

    protected function factoryURL(string $path, array $params): string
    {
        foreach ($params as $param => $value) {
            $param = "{{$param}}";
            $path = str_replace($param, $value, $path);
        }
        return $this->client->getApiURL() . $path;
    }
}
