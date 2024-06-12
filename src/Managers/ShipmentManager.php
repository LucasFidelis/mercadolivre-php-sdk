<?php

namespace LucasFidelis\MercadoLivreSdk\Managers;

use LucasFidelis\MercadoLivreSdk\Entities\Shipment;
use LucasFidelis\MercadoLivreSdk\Managers\Manager;

class ShipmentManager extends Manager
{
    protected static $GET_SHIPMENT_BY_ID_URL = '/shipments/{shipmentId}';

    public function getShipmentById(int $shipmentId): Shipment
    {
        $url = parent::factoryURL(self::$GET_SHIPMENT_BY_ID_URL, ['shipmentId', $shipmentId]);
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        return new Shipment($data);
    }
}