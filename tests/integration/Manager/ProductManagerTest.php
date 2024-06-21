<?php

use LucasFidelis\MercadoLivreSdk\Client\Client;
use LucasFidelis\MercadoLivreSdk\Entities\Product;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Attribute;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Picture;
use LucasFidelis\MercadoLivreSdk\Entities\Product\SaleTerm;
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

    private function getMockData(string $filename): string
    {
        $data = file_get_contents(__DIR__ . '/../../resources/mock/items/' . $filename);
        return $data;
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

    public function testMustGetSalePrice(): void
    {
        $salePrice = $this->sut->getSalePrice('MLB3126075382', 'channel_marketplace', 'buyer_loyalty_3');
        $this->assertEquals(388, $salePrice['amount']);
    }

    public function testMustUpdateProductVariations(): void
    {
        $this->markTestSkipped('Long test');
        $product = $this->sut->findById('MLB3126075382');
        $variations = $product->getVariations();
        $newAvailableQty = $variations[0]->getAvailableQuantity();
        $variations[0]->setAvailableQuantity($newAvailableQty);
        $product->setVariations($variations);
        $product = $this->sut->updateVariations($product);
        $availableQuantity = $product->getVariations()[0]->getAvailableQuantity();
        $this->assertEquals($availableQuantity, $newAvailableQty);
    }

    public function testMustUpdateAvailableQuantity(): void
    {
        $product = $this->sut->findById('MLB3617049700');
        $qty = $product->getAvailableQuantity();
        $product = $this->sut->updateAvailableQuantity($product);
        $this->assertEquals($product->getAvailableQuantity(), $qty);
    }

    public function testMustGetPrices(): void
    {
        $prices = $this->sut->getPrices('MLB3617049700');
        $this->assertIsArray($prices);
        $this->assertIsFloat($prices[0]->getAmount());
    }

    public function testUpdatePrices(): void
    {
        $itemId = 'MLB3617049700';
        $product = $this->sut->findById($itemId);
        $product = $this->sut->updatePrice($product);
        $this->assertInstanceOf(Product::class, $product);
    }

    public function testCreateProduct(): void
    {
        $saleTerms = [
            new SaleTerm([
                'id' => 'WARRANTY_TYPE',
                'value_name' => 'Garantia do vendedor'
            ]),
            new SaleTerm([
                'id' => 'WARRANTY_TIME',
                'value_name' => '90 dias'
            ]),
        ];
        $pictures = [
            new Picture(['url' => 'https://http2.mlstatic.com/D_NQ_NP_2X_873747-MLU76453519258_052024-F.png'])
        ];
        $attributes = [
            new Attribute(['id' => 'BRAND', 'value_name' => 'Marca do produto']),
            new Attribute(['id' => 'EAN', 'value_name' => '7898095297749'])
        ];
        $product = new Product();
        $product->setTitle('Item de test - No Ofertar');
        $product->setCategoryId('MLB3530');
        $product->setPrice(350);
        $product->setCurrencyId('BRL');
        $product->setAvailableQuantity(10);
        $product->setBuyingMode('buy_it_now');
        $product->setCondition('new');
        $product->setListingTypeId('gold_special');
        $product->setSaleTerms($saleTerms);
        $product->setPictures($pictures);
        $product->setAttributes($attributes);
        $product = $this->sut->createProduct($product);
        $this->assertInstanceOf(Product::class, $product);
    }

    public function testMustUpdateProduto(): void
    {
        $client = $this->createMock(Client::class);
        $client->method('put')->willReturn($this->getMockData('MLB3768204734.json'));
        $sut = new ProductManager($client);
        $product = new Product();
        $product->setId('MLB3768204734');
        $product->setAvailableQuantity(5);
        $product->setPrice(2.37);
        
        $client->expects($this->once())->method('put')
            ->with(
                $this->stringContains('/items/MLB3768204734/'), 
                json_encode(['available_quantity' => 5, 'price' => 2.37])
            );
        $output = $sut->updateProduct($product);
        $this->assertInstanceOf(Product::class, $output);
    }
}
