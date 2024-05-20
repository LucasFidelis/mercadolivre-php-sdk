<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class Location
{
	public function __construct()
	{
	}

	public static function fromJson(array $data): self
	{
		return new self(
		);
	}
}
