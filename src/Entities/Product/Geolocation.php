<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class Geolocation
{
	public float $latitude;
	public float $longitude;

	public function __construct(float $latitude, float $longitude)
	{
		$this->latitude = $latitude;
		$this->longitude = $longitude;
	}

	public function getLatitude(): float
	{
		return $this->latitude;
	}

	public function getLongitude(): float
	{
		return $this->longitude;
	}

	public function setLatitude(float $latitude): self
	{
		$this->latitude = $latitude;
		return $this;
	}

	public function setLongitude(float $longitude): self
	{
		$this->longitude = $longitude;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		return new self(
			$data['latitude'],
			$data['longitude']
		);
	}
}
