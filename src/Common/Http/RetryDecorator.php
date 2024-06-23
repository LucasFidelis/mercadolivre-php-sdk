<?php

namespace LucasFidelis\MercadoLivreSdk\Common\Http;

use LucasFidelis\MercadoLivreSdk\Common\Http\Errors\HttpTooManyRequests;
use LucasFidelis\MercadoLivreSdk\Common\Http\HttpClientInterface;
use LucasFidelis\MercadoLivreSdk\Common\Http\HttpMethod;

class RetryDecorator implements HttpClientInterface
{
    private int $attempts = 0;

    public function __construct(
        private readonly int $maxAttempts,
        private readonly int $delayInSeconds,
        private readonly HttpClientInterface $httpClient
    ) {
    }

    public function request(string $url, HttpMethod $method, array $headers = [], string $body = null): string
    {
        try {
            $result = $this->httpClient->request($url, $method, $headers, $body);
            $this->resetAttempts();
            return $result;
        } catch (HttpTooManyRequests $error) {
            $this->canRetry() ? $this->incrementAttemps() : throw $error;
            sleep($this->delayInSeconds);
            return $this->request($url, $method, $headers, $body);
        }
    }

    private function resetAttempts(): void
    {
        $this->attempts = 0;
    }

    private function canRetry(): bool
    {
        return $this->attempts < $this->maxAttempts;
    }

    private function incrementAttemps(): void
    {
        $this->attempts++;
    }
}