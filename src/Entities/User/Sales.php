<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Sales
{
	private string $period;
	private int $completed;

	public function getPeriod(): string
	{
		return $this->period;
	}

	public function getCompleted(): int
	{
		return $this->completed;
	}

	public function setPeriod(string $period): self
	{
		$this->period = $period;
		return $this;
	}

	public function setCompleted(int $completed): self
	{
		$this->completed = $completed;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setPeriod($data['period']);
		$instance->setCompleted($data['completed']);
		return $instance;
	}
}
