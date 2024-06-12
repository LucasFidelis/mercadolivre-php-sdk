<?php

namespace LucasFidelis\MercadoLivreSdk\Entities;

use LucasFidelis\MercadoLivreSdk\Entities\ShipmentCosts\Receiver;
use LucasFidelis\MercadoLivreSdk\Entities\ShipmentCosts\Sender;

class ShipmentCosts extends DataObject
{
    protected array $schema = [
        'receiver' => Receiver::class,
        'senders' => 'array'
    ];

    protected array $collections = [
        'senders' => Sender::class
    ];
}
