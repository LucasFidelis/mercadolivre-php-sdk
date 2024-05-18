<?php

namespace LucasFidelis\MercadoLivreSdk\Common\Http;

class HttpClientFactory
{
    static function create()
    {
        return new CurlAdapter();
    }
}
