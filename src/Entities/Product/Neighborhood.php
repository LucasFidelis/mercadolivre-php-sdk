<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class Neighborhood
{
	public string $id;
	public string $name;

	public function __construct(string $id, string $name)
	{
		$this->id = $id;
		$this->name = $name;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getName(): string
	{
		return $this->name;
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

	public static function fromJson(array $data): self
	{
		return new self(
			$data['id'],
			$data['name']
		);
	}
}
