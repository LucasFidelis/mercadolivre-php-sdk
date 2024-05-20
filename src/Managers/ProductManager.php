<?php

namespace LucasFidelis\MercadoLivreSdk\Managers;

use LucasFidelis\MercadoLivreSdk\Entities\Product;
use LucasFidelis\MercadoLivreSdk\Managers\Manager;

class ProductManager extends Manager
{
    protected static $FIND_BY_ID_URL = '/items/{itemId}/';
    protected static $FIND_ALL_BY_SELLER_ID = '/users/{sellerId}/items/search';

    public function findById($itemId): Product
    {
        $url = parent::factoryURL(self::$FIND_BY_ID_URL, ['itemId' => $itemId]);
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        return Product::fromJson($data);
    }

    /**
     * @return string[]
     */
    public function findAllBySellerId(string $sellerId): array {
        $products = [];
        $total = 0;
        $scrollId = '';
        do {
            $url = parent::factoryURL(self::$FIND_ALL_BY_SELLER_ID, ['sellerId' => $sellerId]);
            $params = [
                'search_type' => 'scan',
                'limit' => 100,
                'scroll_id' => $scrollId
            ];
            $url .= '?' . http_build_query($params);
            $response = $this->client->get($url);
            $data = json_decode($response, true);
            $scrollId = $data['scroll_id'];
            $total = $data['paging']['total'];
            foreach ($data['results'] as $result) {
                $products[] = $result;
            }
        } while (count($products) < $total);
        
        return $products;
    }
}
