<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class Struct
{
	public int $number;
	public string $unit;

	public function __construct(int $number, string $unit)
	{
		$this->number = $number;
		$this->unit = $unit;
	}

	public function getNumber(): int
	{
		return $this->number;
	}

	public function getUnit(): string
	{
		return $this->unit;
	}

	public function setNumber(int $number): self
	{
		$this->number = $number;
		return $this;
	}

	public function setUnit(string $unit): self
	{
		$this->unit = $unit;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		return new self(
			$data['number'],
			$data['unit']
		);
	}
}
