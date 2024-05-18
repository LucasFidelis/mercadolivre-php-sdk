<?php

namespace LucasFidelis\MercadoLivreSdk\Common\Http\Errors;

use Exception;
use Throwable;

class HttpServerError extends Exception {

    public function __construct($message = 'Server Error', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}