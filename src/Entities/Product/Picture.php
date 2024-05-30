<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

use LucasFidelis\MercadoLivreSdk\Entities\DataObject;

class Picture extends DataObject
{
    protected array $schema = [
        'id' => 'string',
        'url' => 'string',
        'secure_url' => 'string',
        'size' => 'string',
        'max_size' => 'string',
        'quality' => 'string',
    ];
}