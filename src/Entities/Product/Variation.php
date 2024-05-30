<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

use LucasFidelis\MercadoLivreSdk\Entities\DataObject;

class Variation extends DataObject
{
    protected array $schema = [
        'id' => 'integer',
        'price' => 'numeric',
        'available_quantity' => 'integer',
        'sold_quantity' => 'string',
        'seller_custom_field' => 'string',
        'catalog_product_id' => 'string'
    ];
}