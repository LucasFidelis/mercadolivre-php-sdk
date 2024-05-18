<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Company
{
	private string $brandName;
	private string $cityTaxId;
	private string $corporateName;
	private string $identification;
	private string $stateTaxId;
	private string $custTypeId;
	private string $softDescriptor;

	public function getBrandName(): string
	{
		return $this->brandName;
	}

	public function getCityTaxId(): string
	{
		return $this->cityTaxId;
	}

	public function getCorporateName(): string
	{
		return $this->corporateName;
	}

	public function getIdentification(): string
	{
		return $this->identification;
	}

	public function getStateTaxId(): string
	{
		return $this->stateTaxId;
	}

	public function getCustTypeId(): string
	{
		return $this->custTypeId;
	}

	public function getSoftDescriptor(): string
	{
		return $this->softDescriptor;
	}

	public function setBrandName(string $brandName): self
	{
		$this->brandName = $brandName;
		return $this;
	}

	public function setCityTaxId(string $cityTaxId): self
	{
		$this->cityTaxId = $cityTaxId;
		return $this;
	}

	public function setCorporateName(string $corporateName): self
	{
		$this->corporateName = $corporateName;
		return $this;
	}

	public function setIdentification(string $identification): self
	{
		$this->identification = $identification;
		return $this;
	}

	public function setStateTaxId(string $stateTaxId): self
	{
		$this->stateTaxId = $stateTaxId;
		return $this;
	}

	public function setCustTypeId(string $custTypeId): self
	{
		$this->custTypeId = $custTypeId;
		return $this;
	}

	public function setSoftDescriptor(string $softDescriptor): self
	{
		$this->softDescriptor = $softDescriptor;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setBrandName($data['brand_name']);
		$instance->setCityTaxId($data['city_tax_id']);
		$instance->setCorporateName($data['corporate_name']);
		$instance->setIdentification($data['identification']);
		$instance->setStateTaxId($data['state_tax_id']);
		$instance->setCustTypeId($data['cust_type_id']);
		$instance->setSoftDescriptor($data['soft_descriptor']);
		return $instance;
	}
}
