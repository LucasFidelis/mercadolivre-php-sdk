<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class SellerAddress
{
	public string $comment;
	public string $addressLine;
	public string $zipCode;
	public City $city;
	public State $state;
	public Country $country;
	public SearchLocation $searchLocation;
	public float $latitude;
	public float $longitude;
	public int $id;

	public function __construct(
		string $comment,
		string $addressLine,
		string $zipCode,
		City $city,
		State $state,
		Country $country,
		SearchLocation $searchLocation,
		float $latitude,
		float $longitude,
		int $id
	) {
		$this->comment = $comment;
		$this->addressLine = $addressLine;
		$this->zipCode = $zipCode;
		$this->city = $city;
		$this->state = $state;
		$this->country = $country;
		$this->searchLocation = $searchLocation;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
		$this->id = $id;
	}

	public function getComment(): string
	{
		return $this->comment;
	}

	public function getAddressLine(): string
	{
		return $this->addressLine;
	}

	public function getZipCode(): string
	{
		return $this->zipCode;
	}

	public function getCity(): City
	{
		return $this->city;
	}

	public function getState(): State
	{
		return $this->state;
	}

	public function getCountry(): Country
	{
		return $this->country;
	}

	public function getSearchLocation(): SearchLocation
	{
		return $this->searchLocation;
	}

	public function getLatitude(): float
	{
		return $this->latitude;
	}

	public function getLongitude(): float
	{
		return $this->longitude;
	}

	public function getId(): int
	{
		return $this->id;
	}

	public function setComment(string $comment): self
	{
		$this->comment = $comment;
		return $this;
	}

	public function setAddressLine(string $addressLine): self
	{
		$this->addressLine = $addressLine;
		return $this;
	}

	public function setZipCode(string $zipCode): self
	{
		$this->zipCode = $zipCode;
		return $this;
	}

	public function setCity(City $city): self
	{
		$this->city = $city;
		return $this;
	}

	public function setState(State $state): self
	{
		$this->state = $state;
		return $this;
	}

	public function setCountry(Country $country): self
	{
		$this->country = $country;
		return $this;
	}

	public function setSearchLocation(SearchLocation $searchLocation): self
	{
		$this->searchLocation = $searchLocation;
		return $this;
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

	public function setId(int $id): self
	{
		$this->id = $id;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		return new self(
			$data['comment'],
			$data['address_line'],
			$data['zip_code'],
			City::fromJson($data['city']),
			State::fromJson($data['state']),
			Country::fromJson($data['country']),
			SearchLocation::fromJson($data['search_location']),
			$data['latitude'],
			$data['longitude'],
			$data['id']
		);
	}
}
