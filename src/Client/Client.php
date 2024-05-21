<?php

namespace LucasFidelis\MercadoLivreSdk\Client;

use LucasFidelis\MercadoLivreSdk\Common\Http\HttpClientFactory;
use LucasFidelis\MercadoLivreSdk\Common\Http\HttpClientInterface;
use LucasFidelis\MercadoLivreSdk\Common\Http\HttpMethod;
use LucasFidelis\MercadoLivreSdk\Entities\User;

class Client
{
    protected static $API_URL = 'https://api.mercadolibre.com';
    protected static $OAUTH_URL = '/oauth/token';
    protected static $USERS_ME_URL = '/users/me';

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

    public function getMe(): User
    {
        $url = self::$API_URL . self::$USERS_ME_URL;
        $headers = [
            'Accept: */*',
            'Authorization: Bearer ' . $this->token
        ];
        $response = $this->httpClient->request($url, HttpMethod::GET, $headers);
        $data = json_decode($response, true);
        $user = User::fromJson($data);
        return $user;
    }

    public function getApiURL(): string
    {
        return self::$API_URL;
    }

    public function get(string $uri, array $headers = []): string
    {
        $headers = [
            ...$headers,
            'Accept: */*',
            'Authorization: Bearer ' . $this->token
        ];
        return $this->httpClient->request($uri, HttpMethod::GET, $headers);
    }

    public function put(string $uri, string $body, array $headers = []): string
    {
        $headers = [
            ...$headers,
            'Accept: */*',
            'Authorization: Bearer ' . $this->token
        ];
        return $this->httpClient->request($uri, HttpMethod::PUT, $headers, $body);
    }
}
