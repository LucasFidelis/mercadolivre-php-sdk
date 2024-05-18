<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Unrated
{
	private null $paid;
	private null $total;

	public function getPaid(): null
	{
		return $this->paid;
	}

	public function getTotal(): null
	{
		return $this->total;
	}

	public function setPaid(null $paid): self
	{
		$this->paid = $paid;
		return $this;
	}

	public function setTotal(null $total): self
	{
		$this->total = $total;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setPaid($data['paid'] ?? null);
		$instance->setTotal($data['total'] ?? null);
		return $instance;
	}
}
