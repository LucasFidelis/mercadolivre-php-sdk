<?php

namespace LucasFidelis\MercadoLivreSdk\Entities;

use JsonSerializable;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Attributes;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Geolocation;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Location;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Pictures;
use LucasFidelis\MercadoLivreSdk\Entities\Product\SaleTerms;
use LucasFidelis\MercadoLivreSdk\Entities\Product\SellerAddress;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Shipping;
use LucasFidelis\MercadoLivreSdk\Entities\Product\Variations;

class Product implements \JsonSerializable
{
    public string $id;
    public string $siteId;
    public string $title;
    public int $sellerId;
    public string $categoryId;
    public null $userProductId;
    public null $officialStoreId;
    public float $price;
    public float $basePrice;
    public ?float $originalPrice;
    public null $inventoryId;
    public string $currencyId;
    public int $initialQuantity;
    public int $availableQuantity;
    public int $soldQuantity;
    /** @var SaleTerms[] */
    public array $saleTerms;
    public string $buyingMode;
    public string $listingTypeId;
    public string $startTime;
    public string $stopTime;
    public string $endTime;
    public string $expirationTime;
    public string $condition;
    public string $permalink;
    public string $thumbnailId;
    public string $thumbnail;
    /** @var Pictures[] */
    public array $pictures;
    public string $videoId;
    public array $descriptions;
    public bool $acceptsMercadopago;
    public array $nonMercadoPagoPaymentMethods;
    public Shipping $shipping;
    public string $internationalDeliveryMode;
    public SellerAddress $sellerAddress;
    public null $sellerContact;
    public Location $location;
    public Geolocation $geolocation;
    public array $coverageAreas;
    /** @var Attributes[] */
    public array $attributes;
    public array $warnings;
    public string $listingSource;
    /** @var Variations[] */
    public array $variations;
    public string $status;
    public array $subStatus;
    /** @var string[] */
    public array $tags;
    public string $warranty;
    public string $catalogProductId;
    public string $domainId;
    public ?string $sellerCustomField;
    public null $parentItemId;
    public null $differentialPricing;
    /** @var string[] */
    public array $dealIds;
    public bool $automaticRelist;
    public string $dateCreated;
    public string $lastUpdated;
    public ?float $health;
    public bool $catalogListing;
    public array $itemRelations;
    /** @var string[] */
    public array $channels;

    /**
     * @param SaleTerms[] $saleTerms
     * @param Pictures[] $pictures
     * @param Attributes[] $attributes
     * @param Variations[] $variations
     * @param string[] $tags
     * @param string[] $dealIds
     * @param string[] $channels
     */
    public function __construct(
        string $id,
        string $siteId,
        string $title,
        int $sellerId,
        string $categoryId,
        null $userProductId,
        null $officialStoreId,
        float $price,
        float $basePrice,
        null $originalPrice,
        null $inventoryId,
        string $currencyId,
        int $initialQuantity,
        int $availableQuantity,
        int $soldQuantity,
        array $saleTerms,
        string $buyingMode,
        string $listingTypeId,
        string $startTime,
        string $stopTime,
        string $endTime,
        string $expirationTime,
        string $condition,
        string $permalink,
        string $thumbnailId,
        string $thumbnail,
        array $pictures,
        string $videoId,
        array $descriptions,
        bool $acceptsMercadopago,
        array $nonMercadoPagoPaymentMethods,
        Shipping $shipping,
        string $internationalDeliveryMode,
        SellerAddress $sellerAddress,
        null $sellerContact,
        Location $location,
        Geolocation $geolocation,
        array $coverageAreas,
        array $attributes,
        array $warnings,
        string $listingSource,
        array $variations,
        string $status,
        array $subStatus,
        array $tags,
        string $warranty,
        string $catalogProductId,
        string $domainId,
        ?string $sellerCustomField,
        null $parentItemId,
        null $differentialPricing,
        array $dealIds,
        bool $automaticRelist,
        string $dateCreated,
        string $lastUpdated,
        ?float $health,
        bool $catalogListing,
        array $itemRelations,
        array $channels
    ) {
        $this->id = $id;
        $this->siteId = $siteId;
        $this->title = $title;
        $this->sellerId = $sellerId;
        $this->categoryId = $categoryId;
        $this->userProductId = $userProductId;
        $this->officialStoreId = $officialStoreId;
        $this->price = $price;
        $this->basePrice = $basePrice;
        $this->originalPrice = $originalPrice;
        $this->inventoryId = $inventoryId;
        $this->currencyId = $currencyId;
        $this->initialQuantity = $initialQuantity;
        $this->availableQuantity = $availableQuantity;
        $this->soldQuantity = $soldQuantity;
        $this->saleTerms = $saleTerms;
        $this->buyingMode = $buyingMode;
        $this->listingTypeId = $listingTypeId;
        $this->startTime = $startTime;
        $this->stopTime = $stopTime;
        $this->endTime = $endTime;
        $this->expirationTime = $expirationTime;
        $this->condition = $condition;
        $this->permalink = $permalink;
        $this->thumbnailId = $thumbnailId;
        $this->thumbnail = $thumbnail;
        $this->pictures = $pictures;
        $this->videoId = $videoId;
        $this->descriptions = $descriptions;
        $this->acceptsMercadopago = $acceptsMercadopago;
        $this->nonMercadoPagoPaymentMethods = $nonMercadoPagoPaymentMethods;
        $this->shipping = $shipping;
        $this->internationalDeliveryMode = $internationalDeliveryMode;
        $this->sellerAddress = $sellerAddress;
        $this->sellerContact = $sellerContact;
        $this->location = $location;
        $this->geolocation = $geolocation;
        $this->coverageAreas = $coverageAreas;
        $this->attributes = $attributes;
        $this->warnings = $warnings;
        $this->listingSource = $listingSource;
        $this->variations = $variations;
        $this->status = $status;
        $this->subStatus = $subStatus;
        $this->tags = $tags;
        $this->warranty = $warranty;
        $this->catalogProductId = $catalogProductId;
        $this->domainId = $domainId;
        $this->sellerCustomField = $sellerCustomField;
        $this->parentItemId = $parentItemId;
        $this->differentialPricing = $differentialPricing;
        $this->dealIds = $dealIds;
        $this->automaticRelist = $automaticRelist;
        $this->dateCreated = $dateCreated;
        $this->lastUpdated = $lastUpdated;
        $this->health = $health;
        $this->catalogListing = $catalogListing;
        $this->itemRelations = $itemRelations;
        $this->channels = $channels;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSiteId(): string
    {
        return $this->siteId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSellerId(): int
    {
        return $this->sellerId;
    }

    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    public function getUserProductId(): null
    {
        return $this->userProductId;
    }

    public function getOfficialStoreId(): null
    {
        return $this->officialStoreId;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getBasePrice(): float
    {
        return $this->basePrice;
    }

    public function getOriginalPrice(): ?float
    {
        return $this->originalPrice;
    }

    public function getInventoryId(): null
    {
        return $this->inventoryId;
    }

    public function getCurrencyId(): string
    {
        return $this->currencyId;
    }

    public function getInitialQuantity(): int
    {
        return $this->initialQuantity;
    }

    public function getAvailableQuantity(): int
    {
        return $this->availableQuantity;
    }

    public function getSoldQuantity(): int
    {
        return $this->soldQuantity;
    }

    /**
     * @return SaleTerms[]
     */
    public function getSaleTerms(): array
    {
        return $this->saleTerms;
    }

    public function getBuyingMode(): string
    {
        return $this->buyingMode;
    }

    public function getListingTypeId(): string
    {
        return $this->listingTypeId;
    }

    public function getStartTime(): string
    {
        return $this->startTime;
    }

    public function getStopTime(): string
    {
        return $this->stopTime;
    }

    public function getEndTime(): string
    {
        return $this->endTime;
    }

    public function getExpirationTime(): string
    {
        return $this->expirationTime;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    public function getPermalink(): string
    {
        return $this->permalink;
    }

    public function getThumbnailId(): string
    {
        return $this->thumbnailId;
    }

    public function getThumbnail(): string
    {
        return $this->thumbnail;
    }

    /**
     * @return Pictures[]
     */
    public function getPictures(): array
    {
        return $this->pictures;
    }

    public function getVideoId(): string
    {
        return $this->videoId;
    }

    public function getDescriptions(): array
    {
        return $this->descriptions;
    }

    public function getAcceptsMercadopago(): bool
    {
        return $this->acceptsMercadopago;
    }

    public function getNonMercadoPagoPaymentMethods(): array
    {
        return $this->nonMercadoPagoPaymentMethods;
    }

    public function getShipping(): Shipping
    {
        return $this->shipping;
    }

    public function getInternationalDeliveryMode(): string
    {
        return $this->internationalDeliveryMode;
    }

    public function getSellerAddress(): SellerAddress
    {
        return $this->sellerAddress;
    }

    public function getSellerContact(): null
    {
        return $this->sellerContact;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }

    public function getGeolocation(): Geolocation
    {
        return $this->geolocation;
    }

    public function getCoverageAreas(): array
    {
        return $this->coverageAreas;
    }

    /**
     * @return Attributes[]
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getWarnings(): array
    {
        return $this->warnings;
    }

    public function getListingSource(): string
    {
        return $this->listingSource;
    }

    /**
     * @return Variations[]
     */
    public function getVariations(): array
    {
        return $this->variations;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getSubStatus(): array
    {
        return $this->subStatus;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    public function getWarranty(): string
    {
        return $this->warranty;
    }

    public function getCatalogProductId(): string
    {
        return $this->catalogProductId;
    }

    public function getDomainId(): string
    {
        return $this->domainId;
    }

    public function getSellerCustomField(): null
    {
        return $this->sellerCustomField;
    }

    public function getParentItemId(): null
    {
        return $this->parentItemId;
    }

    public function getDifferentialPricing(): null
    {
        return $this->differentialPricing;
    }

    /**
     * @return string[]
     */
    public function getDealIds(): array
    {
        return $this->dealIds;
    }

    public function getAutomaticRelist(): bool
    {
        return $this->automaticRelist;
    }

    public function getDateCreated(): string
    {
        return $this->dateCreated;
    }

    public function getLastUpdated(): string
    {
        return $this->lastUpdated;
    }

    public function getHealth(): float
    {
        return $this->health;
    }

    public function getCatalogListing(): bool
    {
        return $this->catalogListing;
    }

    public function getItemRelations(): array
    {
        return $this->itemRelations;
    }

    /**
     * @return string[]
     */
    public function getChannels(): array
    {
        return $this->channels;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setSiteId(string $siteId): self
    {
        $this->siteId = $siteId;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setSellerId(int $sellerId): self
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    public function setCategoryId(string $categoryId): self
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    public function setUserProductId(null $userProductId): self
    {
        $this->userProductId = $userProductId;
        return $this;
    }

    public function setOfficialStoreId(null $officialStoreId): self
    {
        $this->officialStoreId = $officialStoreId;
        return $this;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    public function setBasePrice(float $basePrice): self
    {
        $this->basePrice = $basePrice;
        return $this;
    }

    public function setOriginalPrice(float $originalPrice): self
    {
        $this->originalPrice = $originalPrice;
        return $this;
    }

    public function setInventoryId(null $inventoryId): self
    {
        $this->inventoryId = $inventoryId;
        return $this;
    }

    public function setCurrencyId(string $currencyId): self
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    public function setInitialQuantity(int $initialQuantity): self
    {
        $this->initialQuantity = $initialQuantity;
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

    /**
     * @param SaleTerms[] $saleTerms
     */
    public function setSaleTerms(array $saleTerms): self
    {
        $this->saleTerms = $saleTerms;
        return $this;
    }

    public function setBuyingMode(string $buyingMode): self
    {
        $this->buyingMode = $buyingMode;
        return $this;
    }

    public function setListingTypeId(string $listingTypeId): self
    {
        $this->listingTypeId = $listingTypeId;
        return $this;
    }

    public function setStartTime(string $startTime): self
    {
        $this->startTime = $startTime;
        return $this;
    }

    public function setStopTime(string $stopTime): self
    {
        $this->stopTime = $stopTime;
        return $this;
    }

    public function setEndTime(string $endTime): self
    {
        $this->endTime = $endTime;
        return $this;
    }

    public function setExpirationTime(string $expirationTime): self
    {
        $this->expirationTime = $expirationTime;
        return $this;
    }

    public function setCondition(string $condition): self
    {
        $this->condition = $condition;
        return $this;
    }

    public function setPermalink(string $permalink): self
    {
        $this->permalink = $permalink;
        return $this;
    }

    public function setThumbnailId(string $thumbnailId): self
    {
        $this->thumbnailId = $thumbnailId;
        return $this;
    }

    public function setThumbnail(string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    /**
     * @param Pictures[] $pictures
     */
    public function setPictures(array $pictures): self
    {
        $this->pictures = $pictures;
        return $this;
    }

    public function setVideoId(string $videoId): self
    {
        $this->videoId = $videoId;
        return $this;
    }

    public function setDescriptions(array $descriptions): self
    {
        $this->descriptions = $descriptions;
        return $this;
    }

    public function setAcceptsMercadopago(bool $acceptsMercadopago): self
    {
        $this->acceptsMercadopago = $acceptsMercadopago;
        return $this;
    }

    public function setNonMercadoPagoPaymentMethods(array $nonMercadoPagoPaymentMethods): self
    {
        $this->nonMercadoPagoPaymentMethods = $nonMercadoPagoPaymentMethods;
        return $this;
    }

    public function setShipping(Shipping $shipping): self
    {
        $this->shipping = $shipping;
        return $this;
    }

    public function setInternationalDeliveryMode(string $internationalDeliveryMode): self
    {
        $this->internationalDeliveryMode = $internationalDeliveryMode;
        return $this;
    }

    public function setSellerAddress(SellerAddress $sellerAddress): self
    {
        $this->sellerAddress = $sellerAddress;
        return $this;
    }

    public function setSellerContact(null $sellerContact): self
    {
        $this->sellerContact = $sellerContact;
        return $this;
    }

    public function setLocation(Location $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function setGeolocation(Geolocation $geolocation): self
    {
        $this->geolocation = $geolocation;
        return $this;
    }

    public function setCoverageAreas(array $coverageAreas): self
    {
        $this->coverageAreas = $coverageAreas;
        return $this;
    }

    /**
     * @param Attributes[] $attributes
     */
    public function setAttributes(array $attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function setWarnings(array $warnings): self
    {
        $this->warnings = $warnings;
        return $this;
    }

    public function setListingSource(string $listingSource): self
    {
        $this->listingSource = $listingSource;
        return $this;
    }

    /**
     * @param Variations[] $variations
     */
    public function setVariations(array $variations): self
    {
        $this->variations = $variations;
        return $this;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function setSubStatus(array $subStatus): self
    {
        $this->subStatus = $subStatus;
        return $this;
    }

    /**
     * @param string[] $tags
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    public function setWarranty(string $warranty): self
    {
        $this->warranty = $warranty;
        return $this;
    }

    public function setCatalogProductId(string $catalogProductId): self
    {
        $this->catalogProductId = $catalogProductId;
        return $this;
    }

    public function setDomainId(string $domainId): self
    {
        $this->domainId = $domainId;
        return $this;
    }

    public function setSellerCustomField(?string $sellerCustomField): self
    {
        $this->sellerCustomField = $sellerCustomField;
        return $this;
    }

    public function setParentItemId(null $parentItemId): self
    {
        $this->parentItemId = $parentItemId;
        return $this;
    }

    public function setDifferentialPricing(null $differentialPricing): self
    {
        $this->differentialPricing = $differentialPricing;
        return $this;
    }

    /**
     * @param string[] $dealIds
     */
    public function setDealIds(array $dealIds): self
    {
        $this->dealIds = $dealIds;
        return $this;
    }

    public function setAutomaticRelist(bool $automaticRelist): self
    {
        $this->automaticRelist = $automaticRelist;
        return $this;
    }

    public function setDateCreated(string $dateCreated): self
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    public function setLastUpdated(string $lastUpdated): self
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    public function setHealth(float $health): self
    {
        $this->health = $health;
        return $this;
    }

    public function setCatalogListing(bool $catalogListing): self
    {
        $this->catalogListing = $catalogListing;
        return $this;
    }

    public function setItemRelations(array $itemRelations): self
    {
        $this->itemRelations = $itemRelations;
        return $this;
    }

    /**
     * @param string[] $channels
     */
    public function setChannels(array $channels): self
    {
        $this->channels = $channels;
        return $this;
    }

    public static function fromJson(array $data): self
    {
        return new self(
            $data['id'],
            $data['site_id'],
            $data['title'],
            $data['seller_id'],
            $data['category_id'],
            $data['user_product_id'] ?? null,
            $data['official_store_id'] ?? null,
            $data['price'],
            $data['base_price'],
            $data['original_price'] ?? null,
            $data['inventory_id'] ?? null,
            $data['currency_id'],
            $data['initial_quantity'],
            $data['available_quantity'],
            $data['sold_quantity'],
            array_map(static function ($data) {
                return SaleTerms::fromJson($data);
            }, $data['sale_terms']),
            $data['buying_mode'],
            $data['listing_type_id'],
            $data['start_time'],
            $data['stop_time'],
            $data['end_time'],
            $data['expiration_time'],
            $data['condition'],
            $data['permalink'],
            $data['thumbnail_id'],
            $data['thumbnail'],
            array_map(static function ($data) {
                return Pictures::fromJson($data);
            }, $data['pictures']),
            $data['video_id'],
            $data['descriptions'],
            $data['accepts_mercadopago'],
            $data['non_mercado_pago_payment_methods'],
            Shipping::fromJson($data['shipping']),
            $data['international_delivery_mode'],
            SellerAddress::fromJson($data['seller_address']),
            $data['seller_contact'] ?? null,
            Location::fromJson($data['location']),
            Geolocation::fromJson($data['geolocation']),
            $data['coverage_areas'],
            array_map(static function ($data) {
                return Attributes::fromJson($data);
            }, $data['attributes']),
            $data['warnings'],
            $data['listing_source'],
            array_map(static function ($data) {
                return Variations::fromJson($data);
            }, $data['variations']),
            $data['status'],
            $data['sub_status'],
            $data['tags'],
            $data['warranty'],
            $data['catalog_product_id'],
            $data['domain_id'],
            $data['seller_custom_field'] ?? null,
            $data['parent_item_id'] ?? null,
            $data['differential_pricing'] ?? null,
            $data['deal_ids'],
            $data['automatic_relist'],
            $data['date_created'],
            $data['last_updated'],
            $data['health'],
            $data['catalog_listing'],
            $data['item_relations'],
            $data['channels']
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
