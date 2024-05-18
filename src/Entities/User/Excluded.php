<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Excluded
{
	private int $realValue;
	private int $realRate;

	public function getRealValue(): int
	{
		return $this->realValue;
	}

	public function getRealRate(): int
	{
		return $this->realRate;
	}

	public function setRealValue(int $realValue): self
	{
		$this->realValue = $realValue;
		return $this;
	}

	public function setRealRate(int $realRate): self
	{
		$this->realRate = $realRate;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setRealValue($data['real_value']);
		$instance->setRealRate($data['real_rate']);
		return $instance;
	}
}
