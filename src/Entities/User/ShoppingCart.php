<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class ShoppingCart
{
	private string $buy;
	private string $sell;

	public function getBuy(): string
	{
		return $this->buy;
	}

	public function getSell(): string
	{
		return $this->sell;
	}

	public function setBuy(string $buy): self
	{
		$this->buy = $buy;
		return $this;
	}

	public function setSell(string $sell): self
	{
		$this->sell = $sell;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setBuy($data['buy']);
		$instance->setSell($data['sell']);
		return $instance;
	}
}
