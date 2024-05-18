<?php

namespace LucasFidelis\MercadoLivreSdk\Common\Http;

interface HttpClientInterface
{
    public function request(string $url, HttpMethod $method, array $headers = [], string $body = null): string;
}

enum HttpMethod: string
{
    case GET = 'GET';
    case POST = 'POST';
}
