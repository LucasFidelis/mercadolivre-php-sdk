<?php

namespace LucasFidelis\MercadoLivreSdk\Common\Http\Errors;

use Exception;
use Throwable;

class HttpUnauthorized extends Exception {
    
    public function __construct($message = 'Unauthorized', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}