<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Billing
{
	private bool $allow;
	private array $codes;

	public function getAllow(): bool
	{
		return $this->allow;
	}

	public function getCodes(): array
	{
		return $this->codes;
	}

	public function setAllow(bool $allow): self
	{
		$this->allow = $allow;
		return $this;
	}

	public function setCodes(array $codes): self
	{
		$this->codes = $codes;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setAllow($data['allow']);
		$instance->setCodes($data['codes']);
		return $instance;
	}
}
