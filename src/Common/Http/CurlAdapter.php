<?php

namespace LucasFidelis\MercadoLivreSdk\Common\Http;

use LucasFidelis\MercadoLivreSdk\Common\Http\Errors\HttpBadRequest;
use LucasFidelis\MercadoLivreSdk\Common\Http\Errors\HttpNotFound;
use LucasFidelis\MercadoLivreSdk\Common\Http\Errors\HttpServerError;
use LucasFidelis\MercadoLivreSdk\Common\Http\Errors\HttpTooManyRequests;
use LucasFidelis\MercadoLivreSdk\Common\Http\Errors\HttpUnauthorized;

class CurlAdapter implements HttpClientInterface
{
    public function request(string $url, HttpMethod $method, array $headers = [], ?string $body = null): string
    {
        $ch = curl_init($url);
        $headers = ['Content-Type: application/json', ...$headers];
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method->value);
        if ($body) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return $this->handleRequest($result, $httpCode);
    }

    private function handleRequest(string $result, int $httpCode): string
    {
        switch ($httpCode) {
            case 200:
                return $result;
            case 201:
                return $result;
            case 204:
                return null;
            case 400:
                throw new HttpBadRequest($result);
            case 401:
                throw new HttpUnauthorized($result);
            case 404:
                throw new HttpNotFound($result);
            case 429:
                throw new HttpTooManyRequests($result);
            case 500:
                throw new HttpServerError($result);
            default:
                throw new HttpServerError($result);
        }
    }
}
