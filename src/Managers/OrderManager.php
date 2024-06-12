<?php

namespace LucasFidelis\MercadoLivreSdk\Managers;

use LucasFidelis\MercadoLivreSdk\Entities\BillingInfo;
use LucasFidelis\MercadoLivreSdk\Entities\Order;
use LucasFidelis\MercadoLivreSdk\Managers\Manager;

class OrderManager extends Manager
{
    protected static $GET_BY_ID_URL = '/orders/{orderId}/';
    protected static $GET_BILLING_INFO = '/orders/{orderId}/billing_info';

    public function getOrderById(string $orderId): Order
    {
        $url = parent::factoryURL(self::$GET_BY_ID_URL, ['orderId' => $orderId]);
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        return new Order($data);
    }

    public function getBillingInfo(string $orderId): BillingInfo
    {
        $url = parent::factoryURL(self::$GET_BILLING_INFO, ['orderId' => $orderId]);
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        return new BillingInfo($data['billing_info']);
    }
}