<?php

namespace LucasFidelis\MercadoLivreSdk\Entities;

use LucasFidelis\MercadoLivreSdk\Entities\Order\Buyer;
use LucasFidelis\MercadoLivreSdk\Entities\Order\Coupon;
use LucasFidelis\MercadoLivreSdk\Entities\Order\Seller;
use LucasFidelis\MercadoLivreSdk\Entities\Order\Shipping;

class Order extends DataObject
{
    protected array $schema = [
        'coupon' => Coupon::class,
        'buyer' => Buyer::class,
        'shipping' => Shipping::class,
        'seller' => Seller::class
    ];
}
