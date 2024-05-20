<?php

namespace LucasFidelis\MercadoLivreSdk\Managers;

use LucasFidelis\MercadoLivreSdk\Entities\Product;
use LucasFidelis\MercadoLivreSdk\Managers\Manager;

class ProductManager extends Manager
{
    protected static $FIND_BY_ID_URL = '/items/{itemId}/';

    public function findById($itemId): Product
    {
        $url = parent::factoryURL(self::$FIND_BY_ID_URL, ['itemId' => $itemId]);
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        return Product::fromJson($data);
    }
}
