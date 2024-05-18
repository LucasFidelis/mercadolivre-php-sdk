<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class AlternativePhone
{
	private string $areaCode;
	private string $extension;
	private string $number;

	public function getAreaCode(): string
	{
		return $this->areaCode;
	}

	public function getExtension(): string
	{
		return $this->extension;
	}

	public function getNumber(): string
	{
		return $this->number;
	}

	public function setAreaCode(string $areaCode): self
	{
		$this->areaCode = $areaCode;
		return $this;
	}

	public function setExtension(string $extension): self
	{
		$this->extension = $extension;
		return $this;
	}

	public function setNumber(string $number): self
	{
		$this->number = $number;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setAreaCode($data['area_code']);
		$instance->setExtension($data['extension']);
		$instance->setNumber($data['number']);
		return $instance;
	}
}
