<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class ImmediatePayment
{
	private array $reasons;
	private bool $required;

	public function getReasons(): array
	{
		return $this->reasons;
	}

	public function getRequired(): bool
	{
		return $this->required;
	}

	public function setReasons(array $reasons): self
	{
		$this->reasons = $reasons;
		return $this;
	}

	public function setRequired(bool $required): self
	{
		$this->required = $required;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setReasons($data['reasons']);
		$instance->setRequired($data['required']);
		return $instance;
	}
}
