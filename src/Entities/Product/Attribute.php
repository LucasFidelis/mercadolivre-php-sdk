<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

use LucasFidelis\MercadoLivreSdk\Entities\DataObject;

class Attribute extends DataObject
{
    protected array $schema = [
        'id' => 'string',
        'name' => 'string',
        'value_id' => 'string',
        'value_name' => 'string'
    ];
}
