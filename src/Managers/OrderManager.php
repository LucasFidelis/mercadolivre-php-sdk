<?php

namespace LucasFidelis\MercadoLivreSdk\Managers;

use LucasFidelis\MercadoLivreSdk\Entities\Order;
use LucasFidelis\MercadoLivreSdk\Managers\Manager;

class OrderManager extends Manager
{
    protected static $GET_BY_ID_URL = '/orders/{orderId}/';

    public function getOrderById(string $orderId): Order
    {
        $url = parent::factoryURL(self::$GET_BY_ID_URL, ['orderId' => $orderId]);
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        return new Order($data);
    }
}