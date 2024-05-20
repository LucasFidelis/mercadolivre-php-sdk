<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class Attributes
{
	public string $id;
	public string $name;
	public ?string $valueId;
	public string $valueName;
	/** @var Values[] */
	public array $values;
	public string $valueType;

	/**
	 * @param Values[] $values
	 */
	public function __construct(
		string $id,
		string $name,
		?string $valueId,
		string $valueName,
		array $values,
		string $valueType
	) {
		$this->id = $id;
		$this->name = $name;
		$this->valueId = $valueId;
		$this->valueName = $valueName;
		$this->values = $values;
		$this->valueType = $valueType;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getValueId(): ?string
	{
		return $this->valueId;
	}

	public function getValueName(): string
	{
		return $this->valueName;
	}

	/**
	 * @return Values[]
	 */
	public function getValues(): array
	{
		return $this->values;
	}

	public function getValueType(): string
	{
		return $this->valueType;
	}

	public function setId(string $id): self
	{
		$this->id = $id;
		return $this;
	}

	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}

	public function setValueId(?string $valueId): self
	{
		$this->valueId = $valueId;
		return $this;
	}

	public function setValueName(string $valueName): self
	{
		$this->valueName = $valueName;
		return $this;
	}

	/**
	 * @param Values[] $values
	 */
	public function setValues(array $values): self
	{
		$this->values = $values;
		return $this;
	}

	public function setValueType(string $valueType): self
	{
		$this->valueType = $valueType;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		return new self(
			$data['id'],
			$data['name'],
			$data['value_id'] ?? null,
			$data['value_name'],
			array_map(static function($data) {
				return Values::fromJson($data);
			}, $data['values']),
			$data['value_type']
		);
	}
}
