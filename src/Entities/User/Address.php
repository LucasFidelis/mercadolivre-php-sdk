<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Address
{
	private string $address;
	private string $city;
	private string $state;
	private string $zipCode;

	public function getAddress(): string
	{
		return $this->address;
	}

	public function getCity(): string
	{
		return $this->city;
	}

	public function getState(): string
	{
		return $this->state;
	}

	public function getZipCode(): string
	{
		return $this->zipCode;
	}

	public function setAddress(string $address): self
	{
		$this->address = $address;
		return $this;
	}

	public function setCity(string $city): self
	{
		$this->city = $city;
		return $this;
	}

	public function setState(string $state): self
	{
		$this->state = $state;
		return $this;
	}

	public function setZipCode(string $zipCode): self
	{
		$this->zipCode = $zipCode;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setAddress($data['address']);
		$instance->setCity($data['city']);
		$instance->setState($data['state']);
		$instance->setZipCode($data['zip_code']);
		return $instance;
	}
}
