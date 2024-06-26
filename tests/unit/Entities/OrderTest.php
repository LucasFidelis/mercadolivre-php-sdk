<?php

use LucasFidelis\MercadoLivreSdk\Entities\Order;
use LucasFidelis\MercadoLivreSdk\Entities\Order\Buyer;
use LucasFidelis\MercadoLivreSdk\Entities\Order\Coupon;
use LucasFidelis\MercadoLivreSdk\Entities\Order\Payment;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    private function getMockData(string $filename): array
    {
        $data = file_get_contents(__DIR__ . '/../../resources/mock/orders/' . $filename);
        return json_decode($data, true);
    }

    public function testCanBeCreated(): void
    {
        $mockData = $this->getMockData('2000008464929496.json');
        $order = new Order($mockData);
        $this->assertInstanceOf(Order::class, $order );
    }

    public function testGetCoupon(): void
    {
        $mockData = $this->getMockData('2000008464929496.json');
        $order = new Order($mockData);
        $this->assertInstanceOf(Coupon::class, $order->getCoupon());
    }

    public function testGetBuyer(): void
    {
        $mockData = $this->getMockData('2000008464929496.json');
        $order = new Order($mockData);
        $this->assertInstanceOf(Buyer::class, $order->getBuyer());
        $this->assertEquals(85937594, $order->getBuyer()->getId());
    }

    public function testGetPayments(): void
    {
        $mockData = $this->getMockData('2000008464929496.json');
        $order = new Order($mockData);
        $payment = $order->getPayments()[0];
        $this->assertIsArray($order->getPayments());
        $this->assertInstanceOf(Payment::class, $payment);
    }
}