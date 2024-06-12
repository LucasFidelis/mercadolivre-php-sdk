<?php

namespace LucasFidelis\MercadoLivreSdk\Managers;

use LucasFidelis\MercadoLivreSdk\Entities\Shipment;
use LucasFidelis\MercadoLivreSdk\Entities\ShipmentCosts;
use LucasFidelis\MercadoLivreSdk\Managers\Manager;

class ShipmentManager extends Manager
{
    protected static $GET_SHIPMENT_BY_ID_URL = '/shipments/{shipmentId}';
    protected static $GET_SHIPMENT_COSTS = '/shipments/{shipmentId}/costs';

    public function getShipmentById(int $shipmentId): Shipment
    {
        $url = parent::factoryURL(self::$GET_SHIPMENT_BY_ID_URL, ['shipmentId', $shipmentId]);
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        return new Shipment($data);
    }

    public function getShipmentCosts(int $shipmentId): ShipmentCosts
    {
        $url = parent::factoryURL(self::$GET_SHIPMENT_COSTS, ['shipmentId', $shipmentId]);
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        return new ShipmentCosts($data);
    }
}