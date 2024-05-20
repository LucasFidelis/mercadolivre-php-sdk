<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class SearchLocation
{
	public Neighborhood $neighborhood;
	public City $city;
	public State $state;

	public function __construct(
		Neighborhood $neighborhood,
		City $city,
		State $state
	) {
		$this->neighborhood = $neighborhood;
		$this->city = $city;
		$this->state = $state;
	}

	public function getNeighborhood(): Neighborhood
	{
		return $this->neighborhood;
	}

	public function getCity(): City
	{
		return $this->city;
	}

	public function getState(): State
	{
		return $this->state;
	}

	public function setNeighborhood(Neighborhood $neighborhood): self
	{
		$this->neighborhood = $neighborhood;
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

	public static function fromJson(array $data): self
	{
		return new self(
			Neighborhood::fromJson($data['neighborhood']),
			City::fromJson($data['city']),
			State::fromJson($data['state'])
		);
	}
}
