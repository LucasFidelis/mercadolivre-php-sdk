<?php

namespace LucasFidelis\MercadoLivreSdk\Common\Http\Errors;

use Exception;
use Throwable;

class HttpNotFound extends Exception {

    public function __construct($message = 'Not Found', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}