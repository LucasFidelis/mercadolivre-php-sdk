<?php

namespace LucasFidelis\MercadoLivreSdk\Common\Http\Errors;

use Exception;
use Throwable;

class HttpBadRequest extends Exception {

    public function __construct($message = 'Bad Request', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}