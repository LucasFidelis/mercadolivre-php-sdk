<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Ratings
{
	private float $negative;
	private float $neutral;
	private float $positive;

	public function getNegative(): float
	{
		return $this->negative;
	}

	public function getNeutral(): float
	{
		return $this->neutral;
	}

	public function getPositive(): float
	{
		return $this->positive;
	}

	public function setNegative(float $negative): self
	{
		$this->negative = $negative;
		return $this;
	}

	public function setNeutral(float $neutral): self
	{
		$this->neutral = $neutral;
		return $this;
	}

	public function setPositive(float $positive): self
	{
		$this->positive = $positive;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setNegative($data['negative']);
		$instance->setNeutral($data['neutral']);
		$instance->setPositive($data['positive']);
		return $instance;
	}
}
