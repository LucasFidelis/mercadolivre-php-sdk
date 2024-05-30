<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Claims
{
	private string $period;
	private float $rate;
	private int $value;

	public function getPeriod(): string
	{
		return $this->period;
	}

	public function getRate(): float
	{
		return $this->rate;
	}

	public function getValue(): int
	{
		return $this->value;
	}

	public function getExcluded(): Excluded
	{
		return $this->excluded;
	}

	public function setPeriod(string $period): self
	{
		$this->period = $period;
		return $this;
	}

	public function setRate(float $rate): self
	{
		$this->rate = $rate;
		return $this;
	}

	public function setValue(int $value): self
	{
		$this->value = $value;
		return $this;
	}

	public function setExcluded(Excluded $excluded): self
	{
		$this->excluded = $excluded;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setPeriod($data['period']);
		$instance->setRate($data['rate']);
		$instance->setValue($data['value']);
		return $instance;
	}
}
