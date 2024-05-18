<?php

namespace LucasFidelis\MercadoLivreSdk\Client;

use LucasFidelis\MercadoLivreSdk\Common\Http\HttpClientFactory;
use LucasFidelis\MercadoLivreSdk\Common\Http\HttpClientInterface;
use LucasFidelis\MercadoLivreSdk\Common\Http\HttpMethod;

class Client
{
    protected static $API_URL = 'https://api.mercadolibre.com';
    protected static $OAUTH_URL = '/oauth/token';

    private string $redirect_uri;
    private HttpClientInterface $httpClient;

    public function __construct(
        private string $clientId,
        private string $clientSecret,
        private string $token = '',
        private string $refresh_token = ''
    ) {
        $this->httpClient = HttpClientFactory::create();
    }

    public function authorize(string $code, string $redirect_uri): string
    {
        $this->redirect_uri = $redirect_uri;

        $body = [
            'grant_type' => 'authorization_code',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code' => $code,
            'redirect_uri' => $this->redirect_uri
        ];
        $body = http_build_query($body);

        $headers = [
            'accept' => 'application/json',
            'content-type' => 'application/x-www-form-urlencoded'
        ];
        $url = self::$API_URL . self::$OAUTH_URL;
        $response = $this->httpClient->request($url, HttpMethod::POST, $headers, $body);

        $data = json_decode($response, true);
        $this->token = $data['access_token'];
        $this->refresh_token = $data['refresh_token'];

        return $response;
    }
}
