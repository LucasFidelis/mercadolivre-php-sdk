<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class Values
{
	public string|null $id;
	public string $name;
	public array|null $struct;

	public function __construct(
		string|null $id,
		string $name,
		array|null $struct
	) {
		$this->id = $id;
		$this->name = $name;
		$this->struct = $struct;
	}

	public function getId(): string|null
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getStruct(): array|null
	{
		return $this->struct;
	}

	public function setId(string|null $id): self
	{
		$this->id = $id;
		return $this;
	}

	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}

	public function setStruct(array|null $struct): self
	{
		$this->struct = $struct;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		return new self(
			$data['id'],
			$data['name'],
			$data['struct'] ?? null
		);
	}
}
