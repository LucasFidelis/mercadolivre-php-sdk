<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class Shipping
{
	public string $mode;
	public array $methods;
	/** @var string[] */
	public array $tags;
	public null $dimensions;
	public bool $localPickUp;
	public bool $freeShipping;
	public string $logisticType;
	public bool $storePickUp;

	/**
	 * @param string[] $tags
	 */
	public function __construct(
		string $mode,
		array $methods,
		array $tags,
		null $dimensions,
		bool $localPickUp,
		bool $freeShipping,
		string $logisticType,
		bool $storePickUp
	) {
		$this->mode = $mode;
		$this->methods = $methods;
		$this->tags = $tags;
		$this->dimensions = $dimensions;
		$this->localPickUp = $localPickUp;
		$this->freeShipping = $freeShipping;
		$this->logisticType = $logisticType;
		$this->storePickUp = $storePickUp;
	}

	public function getMode(): string
	{
		return $this->mode;
	}

	public function getMethods(): array
	{
		return $this->methods;
	}

	/**
	 * @return string[]
	 */
	public function getTags(): array
	{
		return $this->tags;
	}

	public function getDimensions(): null
	{
		return $this->dimensions;
	}

	public function getLocalPickUp(): bool
	{
		return $this->localPickUp;
	}

	public function getFreeShipping(): bool
	{
		return $this->freeShipping;
	}

	public function getLogisticType(): string
	{
		return $this->logisticType;
	}

	public function getStorePickUp(): bool
	{
		return $this->storePickUp;
	}

	public function setMode(string $mode): self
	{
		$this->mode = $mode;
		return $this;
	}

	public function setMethods(array $methods): self
	{
		$this->methods = $methods;
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

	public function setDimensions(null $dimensions): self
	{
		$this->dimensions = $dimensions;
		return $this;
	}

	public function setLocalPickUp(bool $localPickUp): self
	{
		$this->localPickUp = $localPickUp;
		return $this;
	}

	public function setFreeShipping(bool $freeShipping): self
	{
		$this->freeShipping = $freeShipping;
		return $this;
	}

	public function setLogisticType(string $logisticType): self
	{
		$this->logisticType = $logisticType;
		return $this;
	}

	public function setStorePickUp(bool $storePickUp): self
	{
		$this->storePickUp = $storePickUp;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		return new self(
			$data['mode'],
			$data['methods'],
			$data['tags'],
			$data['dimensions'] ?? null,
			$data['local_pick_up'],
			$data['free_shipping'],
			$data['logistic_type'],
			$data['store_pick_up']
		);
	}
}
