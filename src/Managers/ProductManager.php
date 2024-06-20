<?php

namespace LucasFidelis\MercadoLivreSdk\Managers;

use LucasFidelis\MercadoLivreSdk\Entities\Price;
use LucasFidelis\MercadoLivreSdk\Entities\Product;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Picture;
use LucasFidelis\MercadoLivreSdk\Managers\Manager;

class ProductManager extends Manager
{
    protected static $FIND_BY_ID_URL = '/items/{itemId}/';
    protected static $FIND_ALL_BY_SELLER_ID = '/users/{sellerId}/items/search';
    protected static $SALE_PRICE = '/items/{itemId}/sale_price?context={channel}.{loyaltyLevel}';
    protected static $ITEM_URL = '/items/{itemId}/';
    protected static $STANDARD_PRICES_URL = '/items/{itemId}/prices/standard';
    protected static $ITEM_PRICES_URL = '/items/{itemId}/prices';
    protected static $CREATE_ITEM_URL = '/items';

    public function findById($itemId): Product
    {
        $url = parent::factoryURL(self::$FIND_BY_ID_URL, ['itemId' => $itemId]);
        $url .= "?include_attributes=all"; 
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        return new Product($data);
    }

    /**
     * @return string[]
     */
    public function findAllBySellerId(string $sellerId): array
    {
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

    public function getSalePrice(string $itemId, string $channel, string $loyaltyLevel): array
    {
        $url = parent::factoryURL(
            self::$SALE_PRICE,
            [
                'itemId' => $itemId,
                'channel' => $channel,
                'loyaltyLevel' => $loyaltyLevel
            ]
        );
        $response = $this->client->get($url);
        return json_decode($response, true);
    }

    public function updateVariations(Product $product): Product
    {
        $itemId = $product->getId();
        $url = parent::factoryURL(self::$ITEM_URL, ['itemId' => $itemId]);
        $body = [
            'variations' => $product->getVariations()
        ];
        $body = json_decode(json_encode($body), true);
        foreach ($body['variations'] as $variation => $variationData) {
            unset($body['variations'][$variation]['catalog_product_id']);
        }
        $this->client->put($url, json_encode($body));
        return $this->findById($itemId);
    }

    public function updateAvailableQuantity(Product $product): Product
    {
        $itemId = $product->getId();
        $url = parent::factoryURL(self::$ITEM_URL, ['itemId' => $itemId]);
        $body = [
            'available_quantity' => $product->getAvailableQuantity()
        ];
        $response = $this->client->put($url, json_encode($body));
        $data = json_decode($response, true);
        return new Product($data);
    }

    /**
     * @return Price[]
     */
    public function getPrices(string $itemId): array
    {
        $prices = [];
        $url = parent::factoryURL(self::$ITEM_PRICES_URL, ['itemId' => $itemId]);
        $response = $this->client->get($url);
        $data = json_decode($response, true);
        foreach ($data['prices'] as $priceData) {
            $prices[] = Price::fromJson($priceData);
        }
        return $prices;
    }

    public function updatePrice(Product $product): Product
    {
        $itemId = $product->getId();
        $url = parent::factoryURL(self::$ITEM_URL, ['itemId' => $itemId]);
        $body = [
            'price' => $product->getPrice(),
        ];
        $body = json_encode($body);
        $response = $this->client->put($url, $body);
        $data = json_decode($response, true);
        return new Product($data);
    }

    public function createProduct(Product $product): Product
    {
        $url = parent::factoryURL(self::$CREATE_ITEM_URL, []);
        $body = json_decode(json_encode($product), true);
        $body['pictures'] = array_map(static function (Picture $picture) {
            return ['source' => $picture->getUrl() ];
        }, $product->getPictures());
        $body = json_encode($body);
        $response = $this->client->post($url, $body);
        $data = json_decode($response, true);
        $itemId = $data['id'];
        return $this->findById($itemId);
    }

    public function updateStatus(Product $product): Product
    {
        $itemId = $product->getId();
        $url = parent::factoryURL(self::$ITEM_URL, ['itemId' => $itemId]);
        $body = [
            'status' => $product->getStatus(),
        ];
        $body = json_encode($body);
        $this->client->put($url, $body);
        return $this->findById($itemId);
    }
}
