<?php

use LucasFidelis\MercadoLivreSdk\Client\Client;
use LucasFidelis\MercadoLivreSdk\Entities\Shipment;
use LucasFidelis\MercadoLivreSdk\Entities\ShipmentCosts;
use LucasFidelis\MercadoLivreSdk\Entities\ShipmentItem;
use LucasFidelis\MercadoLivreSdk\Managers\ShipmentManager;
use PHPUnit\Framework\TestCase;

class ShipmentManagerTest extends TestCase
{
    /**
     * @var ShipmentManager
     */
    private ShipmentManager $sut;
    private Client $clientStub;

    public function setUp(): void
    {
        $this->clientStub = $this->createMock(Client::class);
        $this->sut = new ShipmentManager($this->clientStub);
    }

    private function getMockData(string $filename): string
    {
        $data = file_get_contents(__DIR__ . '/../../resources/mock/shipments/' . $filename);
        return $data;
    }

    public function testMustGetShipmentById(): void
    {
        $this->clientStub->method('get')
            ->willReturn($this->getMockData('43474637041.json'));
        $this->clientStub->expects($this->once())->method('get')->with($this->stringContains('/shipments/43474637041'));
        $shipment =  $this->sut->getShipmentById(43474637041);
        $this->assertInstanceOf(Shipment::class, $shipment);
        $this->assertEquals('ready_to_ship', $shipment->getStatus());
    }

    public function testMustGetShipmentCosts(): void
    {
        $this->clientStub->method('get')
            ->willReturn($this->getMockData('costs/43474637041.json'));
        $this->clientStub->expects($this->once())->method('get')->with($this->stringContains('/shipments/43474637041/costs'));
        $shipmentCosts =  $this->sut->getShipmentCosts(43474637041);
        $this->assertInstanceOf(ShipmentCosts::class, $shipmentCosts);
        $this->assertEquals(71.3, $shipmentCosts->getGrossAmount());
        $this->assertEquals(20.45, $shipmentCosts->getSenders()[0]->getCost());
        $this->assertEquals(0, $shipmentCosts->getReceiver()->getCost());
    }

    public function testMustGetShipmentItems(): void
    {
        $this->clientStub->method('get')
            ->willReturn($this->getMockData('items/43487963697.json'));
        $this->clientStub->expects($this->once())->method('get')->with($this->stringContains('/shipments/43487963697/items'));
        $shipmentItems = $this->sut->getShipmentItems(43487963697);
        $this->assertIsArray($shipmentItems);
        $this->assertContainsOnlyInstancesOf(ShipmentItem::class, $shipmentItems);
        $this->assertEquals('Patch Cord Singlemode 2sc-2lc 1,5m Nexans Azul', $shipmentItems[0]->getDescription());
    }

    public function testMustGetShipmentLabelAsZPL(): void
    {
        $this->clientStub->method('get')
            ->willReturn($this->getMockData('labels/zpl/43498572272.zip'));
        $shipmentLabel = $this->sut->getShipmentLabelAsZPL(43498572272);
        $this->assertIsString($shipmentLabel);
        $this->assertStringContainsString('^XA', $shipmentLabel);
        $this->assertStringContainsString('^XZ', $shipmentLabel);
    }
}