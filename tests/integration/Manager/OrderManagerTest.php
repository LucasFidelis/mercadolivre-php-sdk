<?php

use LucasFidelis\MercadoLivreSdk\Client\Client;
use LucasFidelis\MercadoLivreSdk\Entities\BillingInfo;
use LucasFidelis\MercadoLivreSdk\Managers\OrderManager;
use LucasFidelis\MercadoLivreSdk\Entities\Order;
use PHPUnit\Framework\TestCase;

class OrderManagerTest extends TestCase
{
    /**
     * @var OrderManager
     */
    private Client $clientStub;
    private OrderManager $sut;

    public function setUp(): void
    {
        $this->clientStub = $this->createStub(Client::class);
        $this->sut = new OrderManager($this->clientStub);
    }

    private function getMockData(string $filename) 
    {
        $data = file_get_contents(__DIR__ . '/../../resources/mock/orders/' . $filename);
        return $data;
    }

    public function testMustGetOrderById(): void
    {
        $this->clientStub->method('get')
            ->willReturn($this->getMockData('2000008464929496.json'));
        $order =  $this->sut->getOrderById('2000008464929496');
        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals(90, $order->getTotalAmount());
    }

    public function testMustGetBillingInfo(): void
    {
        $this->clientStub->method('get')
            ->willReturn($this->getMockData('billing_info/2000008464929496.json'));
        $billingInfo =  $this->sut->getBillingInfo('2000008464929496');
        $this->assertInstanceOf(BillingInfo::class, $billingInfo);
        $this->assertIsArray($billingInfo->getAdditionalInfo());
        $this->assertGreaterThan(2, count($billingInfo->getAdditionalInfo()));
    }
}