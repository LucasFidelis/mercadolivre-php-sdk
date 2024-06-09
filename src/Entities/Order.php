<?php

namespace LucasFidelis\MercadoLivreSdk\Entities;

use LucasFidelis\MercadoLivreSdk\Entities\Order\Buyer;
use LucasFidelis\MercadoLivreSdk\Entities\Order\Coupon;

class Order extends DataObject
{
    protected array $schema = [
        'coupon' => Coupon::class,
        'buyer' => Buyer::class
    ];
}
