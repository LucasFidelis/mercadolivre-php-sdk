<?php

namespace LucasFidelis\MercadoLivreSdk\Client;

use LucasFidelis\MercadoLivreSdk\Client\Client;
use LucasFidelis\MercadoLivreSdk\Common\Http\HttpClientFactory;
use LucasFidelis\MercadoLivreSdk\Common\Http\HttpClientInterface;
use LucasFidelis\MercadoLivreSdk\Common\Http\RetryDecorator;

class ClientBuilder
{
    private string $token = '';
    private string $refreshToken = '';
    private ?HttpClientInterface $httpClient;
    
    public function __construct(
        public readonly string $clientId,
        public readonly string $clientSecret,
    ) {
    }

    public function setToken(string $value): void
    {
        $this->token = $value;
    }

    public function setRefreshToken(string $value): void
    {
        $this->refreshToken = $value;
    }

    public function setRetryPattern(int $maxAttempts, int $delayInSeconds): void
    {
        $httpClient = HttpClientFactory::create();
        $this->httpClient = new RetryDecorator($maxAttempts, $delayInSeconds, $httpClient);
    }

    public function build(): Client
    {
        return new Client(
            $this->clientId, 
            $this->clientSecret,
            $this->token,
            $this->refreshToken,
            $this->httpClient
        );
    }
}
