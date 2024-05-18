<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Identification
{
	private string $number;
	private string $type;

	public function getNumber(): string
	{
		return $this->number;
	}

	public function getType(): string
	{
		return $this->type;
	}

	public function setNumber(string $number): self
	{
		$this->number = $number;
		return $this;
	}

	public function setType(string $type): self
	{
		$this->type = $type;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setNumber($data['number']);
		$instance->setType($data['type']);
		return $instance;
	}
}
