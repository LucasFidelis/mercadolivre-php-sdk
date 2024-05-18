<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Phone
{
	private null $areaCode;
	private string $extension;
	private string $number;
	private bool $verified;

	public function getAreaCode(): null
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

	public function getVerified(): bool
	{
		return $this->verified;
	}

	public function setAreaCode(null $areaCode): self
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

	public function setVerified(bool $verified): self
	{
		$this->verified = $verified;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setAreaCode($data['area_code'] ?? null);
		$instance->setExtension($data['extension']);
		$instance->setNumber($data['number']);
		$instance->setVerified($data['verified']);
		return $instance;
	}
}
