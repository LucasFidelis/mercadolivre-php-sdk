<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class Variations implements \JsonSerializable
{
    public int $id;
    public int $price;
    /** @var AttributeCombinations[] */
    public array $attributeCombinations;
    public int $availableQuantity;
    public int $soldQuantity;
    public array $saleTerms;
    /** @var string[] */
    public array $pictureIds;
    public null $sellerCustomField;
    public string $catalogProductId;
    public null $inventoryId;
    public array $itemRelations;
    public null $userProductId;

    /**
     * @param AttributeCombinations[] $attributeCombinations
     * @param string[] $pictureIds
     */
    public function __construct(
        int $id,
        int $price,
        array $attributeCombinations,
        int $availableQuantity,
        int $soldQuantity,
        array $saleTerms,
        array $pictureIds,
        null $sellerCustomField,
        string $catalogProductId,
        null $inventoryId,
        array $itemRelations,
        null $userProductId
    ) {
        $this->id = $id;
        $this->price = $price;
        $this->attributeCombinations = $attributeCombinations;
        $this->availableQuantity = $availableQuantity;
        $this->soldQuantity = $soldQuantity;
        $this->saleTerms = $saleTerms;
        $this->pictureIds = $pictureIds;
        $this->sellerCustomField = $sellerCustomField;
        $this->catalogProductId = $catalogProductId;
        $this->inventoryId = $inventoryId;
        $this->itemRelations = $itemRelations;
        $this->userProductId = $userProductId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return AttributeCombinations[]
     */
    public function getAttributeCombinations(): array
    {
        return $this->attributeCombinations;
    }

    public function getAvailableQuantity(): int
    {
        return $this->availableQuantity;
    }

    public function getSoldQuantity(): int
    {
        return $this->soldQuantity;
    }

    public function getSaleTerms(): array
    {
        return $this->saleTerms;
    }

    /**
     * @return string[]
     */
    public function getPictureIds(): array
    {
        return $this->pictureIds;
    }

    public function getSellerCustomField(): null
    {
        return $this->sellerCustomField;
    }

    public function getCatalogProductId(): string
    {
        return $this->catalogProductId;
    }

    public function getInventoryId(): null
    {
        return $this->inventoryId;
    }

    public function getItemRelations(): array
    {
        return $this->itemRelations;
    }

    public function getUserProductId(): null
    {
        return $this->userProductId;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @param AttributeCombinations[] $attributeCombinations
     */
    public function setAttributeCombinations(array $attributeCombinations): self
    {
        $this->attributeCombinations = $attributeCombinations;
        return $this;
    }

    public function setAvailableQuantity(int $availableQuantity): self
    {
        $this->availableQuantity = $availableQuantity;
        return $this;
    }

    public function setSoldQuantity(int $soldQuantity): self
    {
        $this->soldQuantity = $soldQuantity;
        return $this;
    }

    public function setSaleTerms(array $saleTerms): self
    {
        $this->saleTerms = $saleTerms;
        return $this;
    }

    /**
     * @param string[] $pictureIds
     */
    public function setPictureIds(array $pictureIds): self
    {
        $this->pictureIds = $pictureIds;
        return $this;
    }

    public function setSellerCustomField(null $sellerCustomField): self
    {
        $this->sellerCustomField = $sellerCustomField;
        return $this;
    }

    public function setCatalogProductId(string $catalogProductId): self
    {
        $this->catalogProductId = $catalogProductId;
        return $this;
    }

    public function setInventoryId(null $inventoryId): self
    {
        $this->inventoryId = $inventoryId;
        return $this;
    }

    public function setItemRelations(array $itemRelations): self
    {
        $this->itemRelations = $itemRelations;
        return $this;
    }

    public function setUserProductId(null $userProductId): self
    {
        $this->userProductId = $userProductId;
        return $this;
    }

    public static function fromJson(array $data): self
    {
        return new self(
            $data['id'],
            $data['price'],
            array_map(static function ($data) {
                return AttributeCombinations::fromJson($data);
            }, $data['attribute_combinations']),
            $data['available_quantity'],
            $data['sold_quantity'],
            $data['sale_terms'],
            $data['picture_ids'],
            $data['seller_custom_field'] ?? null,
            $data['catalog_product_id'],
            $data['inventory_id'] ?? null,
            $data['item_relations'],
            $data['user_product_id'] ?? null
        );
    }

    public function jsonSerialize(): mixed
    {
        $data = [];
        $vars = get_object_vars($this);
        foreach ($vars as $key => $value) {
            $key = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));
            $data[$key] = $value;
        }
        return $data;
    }
}
