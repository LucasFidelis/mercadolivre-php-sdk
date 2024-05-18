<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Buy
{
	private bool $allow;
	private array $codes;
	private ImmediatePayment $immediatePayment;

	public function getAllow(): bool
	{
		return $this->allow;
	}

	public function getCodes(): array
	{
		return $this->codes;
	}

	public function getImmediatePayment(): ImmediatePayment
	{
		return $this->immediatePayment;
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

	public function setImmediatePayment(ImmediatePayment $immediatePayment): self
	{
		$this->immediatePayment = $immediatePayment;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setAllow($data['allow']);
		$instance->setCodes($data['codes']);
		$instance->setImmediatePayment(ImmediatePayment::fromJson($data['immediate_payment']));
		return $instance;
	}
}
