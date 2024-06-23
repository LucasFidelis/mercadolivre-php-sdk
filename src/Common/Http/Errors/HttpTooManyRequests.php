<?php

namespace LucasFidelis\MercadoLivreSdk\Common\Http\Errors;

use Exception;
use Throwable;

class HttpTooManyRequests extends Exception {

    public function __construct($message = 'Too Many Requests', $code = 429, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}