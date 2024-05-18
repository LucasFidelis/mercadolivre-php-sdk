<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class DelayedHandlingTime
{
	private string $period;
	private int $rate;
	private int $value;
	private Excluded $excluded;

	public function getPeriod(): string
	{
		return $this->period;
	}

	public function getRate(): int
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

	public function setRate(int $rate): self
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
		$instance->setExcluded(Excluded::fromJson($data['excluded']));
		return $instance;
	}
}
