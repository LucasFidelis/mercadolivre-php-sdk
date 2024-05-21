<?php

use LucasFidelis\MercadoLivreSdk\Client\Client;
use LucasFidelis\MercadoLivreSdk\Entities\Product;
use LucasFidelis\MercadoLivreSdk\Managers\ProductManager;
use PHPUnit\Framework\TestCase;

class ProductManagerTest extends TestCase
{
    /**
     * @var ProductManager
     */
    private ProductManager $sut;

    public function setUp(): void
    {
        $client = new Client(CLIENT_ID, CLIENT_SECRET, ACCESS_TOKEN, REFRESH_TOKEN);
        $this->sut = new ProductManager($client);
    }

    public function testMustFindItemById(): void
    {
        $product = $this->sut->findById('MLB3126075382');
        $this->assertInstanceOf(Product::class, $product);
    }

    public function testMustFindAllBySellerId(): void
    {
        $this->markTestSkipped('Long test');
        $products = $this->sut->findAllBySellerId(USER_ID);
        $this->assertIsArray($products);
        $this->assertNotTrue(empty($products));
        $this->assertNotTrue(empty($products[0]));
    }

    public function testMustGetSalePrice(): void {
        $salePrice = $this->sut->getSalePrice('MLB3126075382', 'channel_marketplace', 'buyer_loyalty_3');
        $this->assertEquals(388, $salePrice['amount']);
    }

    public function testMustUpdateProductVariations(): void {
        $product = $this->sut->findById('MLB3126075382');
        $variations = $product->getVariations();
        $newAvailableQty = $variations[0]->getAvailableQuantity();
        $variations[0]->setAvailableQuantity($newAvailableQty);
        $product->setVariations($variations);
        $product = $this->sut->updateVariations($product);
        $availableQuantity = $product->getVariations()[0]->getAvailableQuantity();
        $this->assertEquals($availableQuantity, $newAvailableQty);
    }

    public function testMustUpdateAvailableQuantity(): void {
        $product = $this->sut->findById('MLB3617049700');
        $qty = $product->getAvailableQuantity();
        $product = $this->sut->updateAvailableQuantity($product);
        $this->assertEquals($product->getAvailableQuantity(), $qty);
    }

    public function testMustGetPrices(): void {
        $prices = $this->sut->getPrices('MLB3617049700');
        $this->assertIsArray($prices);
        $this->assertIsFloat($prices[0]->getAmount());
    }
}
