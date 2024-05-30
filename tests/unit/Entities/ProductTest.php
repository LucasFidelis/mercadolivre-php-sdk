<?php

use LucasFidelis\MercadoLivreSdk\Entities\Product;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Picture;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testCanBeCreated(): void
    {
        $product = new Product();
        $this->assertInstanceOf(Product::class, $product);
    }

    public function testCanBeCreatedFromData(): void
    {   
        $title = 'ASUS ROG Strix GeForce RTX 4060 Ti OC Edition';
        $product = new Product(['title' => $title]);
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($title, $product->getTitle());
    }

    public function testSetTitle(): void
    {
        $product = new Product();
        $title = 'ASUS ROG Strix GeForce RTX 4060 Ti OC Edition';
        $product->setTitle($title);
        $this->assertEquals($title, $product->getTitle());
    }

    public function testGetSchema(): void
    {
        $product = new Product();
        $schema = $product->getSchema();
        $this->assertEquals('string', $schema['title']);
    }

    public function testThrowsAnExceptionWhenTypeIsInvalid(): void
    {
        $this->expectExceptionMessage('Invalid type title::string');
        $product = new Product();
        $product->setTitle(false);
    }

    public function testSetPictures(): void 
    {
        $picture = ([
            'id' => '971132-MLA43558185924_092020',
            'url' => 'http://http2.mlstatic.com/resources/frontend/statics/processing-image/1.0.0/O-ES.jpg',
            'secure_url' => 'http://http2.mlstatic.com/resources/frontend/statics/processing-image/1.0.0/O-ES.jpg',
            'size' => '500x500',
            'max_size' => '500x500',
            'quality' => ''
        ]);
        $product = new Product();
        $product->setPictures([$picture]);
        $this->assertIsArray($product->getPictures());
        $this->assertInstanceOf(Picture::class, $product->getPictures()[0]);
    }

    public function testSetPrice(): void
    {
        $product = new Product();
        $price = 123.78;
        $product->setPrice($price);
        $this->assertEquals($price, $product->getPrice());
    }
}
