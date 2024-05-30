<?php

namespace LucasFidelis\MercadoLivreSdk\Entities;

use LucasFidelis\MercadoLivreSdk\Entities\Product\Attribute;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Picture;
use LucasFidelis\MercadoLivreSdk\Entities\Product\SaleTerm;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Variation;

class Product extends DataObject
{
    protected array $schema = [
        'title' => 'string',
        'category_id' => 'string',
        'price' => 'numeric',
        'currency_id' => 'string',
        'available_quantity' => 'integer',
        'buying_mode' => 'string',
        'condition' => 'string',
        'listing_type_id' => 'string',
        'sale_terms' => 'array',
        'pictures' => 'array',
        'attributes' => 'array',
        'variations' => 'array'
    ];

    protected array $collections = [
        'sale_terms' => SaleTerm::class,
        'pictures' => Picture::class,
        'attributes' => Attribute::class,
        'variations' => Variation::class,
    ];
}
