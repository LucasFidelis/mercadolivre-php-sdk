<?php

namespace LucasFidelis\MercadoLivreSdk\Managers;

use LucasFidelis\MercadoLivreSdk\Entities\Shipment;
use LucasFidelis\MercadoLivreSdk\Entities\ShipmentCosts;
use LucasFidelis\MercadoLivreSdk\Entities\ShipmentItem;
use LucasFidelis\MercadoLivreSdk\Managers\Manager;
use ZipArchive;

class ShipmentManager extends Manager
{
    protected static $GET_SHIPMENT_BY_ID_URL = '/shipments/{shipmentId}';
    protected static $GET_SHIPMENT_COSTS = '/shipments/{shipmentId}/costs';
    protected static $GET_SHIPMENT_ITEMS = '/shipments/{shipmentId}/items';
    protected static $GET_SHIPMENT_LABEL = '/shipment_labels?shipment_ids={shipmentId}&response_type={responseType}';

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

    /**
     * @return ShipmentItem[]
     */
    public function getShipmentItems(int $shipmentId): array
    {
        $url = parent::factoryURL(self::$GET_SHIPMENT_ITEMS, ['shipmentId', $shipmentId]);
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        return array_map(static function ($shipmentItemData) {
            return new ShipmentItem($shipmentItemData);
        }, $data);
    }

    public function getShipmentLabelAsZPL(int $shipmentId): string
    {
        $url = parent::factoryURL(self::$GET_SHIPMENT_LABEL, ['shipmentId' => $shipmentId, 'responseType' => 'zpl2']);
        $headers = ['Content-Type: application/zip'];
        $response = $this->client->get($url, $headers);
        return  $this->createShipmentLabelAtTemp($shipmentId, $response, 'Etiqueta de envio.txt');
    }

    private function createShipmentLabelAtTemp(int $shipmentId, string $zipContent, string $entryName): string
    {
        $tempDir = sys_get_temp_dir();
        $filename = "$tempDir/$shipmentId.zip";
        file_put_contents($filename, $zipContent);
        $zip = new ZipArchive;
        $zip->open($filename);
        $content = $zip->getFromName($entryName);
        $zip->close();
        unlink($filename);
        return $content;
    }
}