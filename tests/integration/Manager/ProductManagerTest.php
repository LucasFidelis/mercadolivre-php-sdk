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
}
