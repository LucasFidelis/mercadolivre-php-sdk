<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class NotYetRated
{
	private null $paid;
	private null $total;
	private null $units;

	public function getPaid(): null
	{
		return $this->paid;
	}

	public function getTotal(): null
	{
		return $this->total;
	}

	public function getUnits(): null
	{
		return $this->units;
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

	public function setUnits(null $units): self
	{
		$this->units = $units;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setPaid($data['paid'] ?? null);
		$instance->setTotal($data['total'] ?? null);
		$instance->setUnits($data['units'] ?? null);
		return $instance;
	}
}
