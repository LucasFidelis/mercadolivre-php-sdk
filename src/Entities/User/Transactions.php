<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Transactions
{
	private Canceled $canceled;
	private null $completed;
	private NotYetRated $notYetRated;
	private string $period;
	private null $total;
	private Unrated $unrated;

	public function getCanceled(): Canceled
	{
		return $this->canceled;
	}

	public function getCompleted(): null
	{
		return $this->completed;
	}

	public function getNotYetRated(): NotYetRated
	{
		return $this->notYetRated;
	}

	public function getPeriod(): string
	{
		return $this->period;
	}

	public function getTotal(): null
	{
		return $this->total;
	}

	public function getUnrated(): Unrated
	{
		return $this->unrated;
	}

	public function setCanceled(Canceled $canceled): self
	{
		$this->canceled = $canceled;
		return $this;
	}

	public function setCompleted(null $completed): self
	{
		$this->completed = $completed;
		return $this;
	}

	public function setNotYetRated(NotYetRated $notYetRated): self
	{
		$this->notYetRated = $notYetRated;
		return $this;
	}

	public function setPeriod(string $period): self
	{
		$this->period = $period;
		return $this;
	}

	public function setTotal(null $total): self
	{
		$this->total = $total;
		return $this;
	}

	public function setUnrated(Unrated $unrated): self
	{
		$this->unrated = $unrated;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setCanceled(Canceled::fromJson($data['canceled']));
		$instance->setCompleted($data['completed'] ?? null);
		$instance->setNotYetRated(NotYetRated::fromJson($data['not_yet_rated']));
		$instance->setPeriod($data['period']);
		$instance->setTotal($data['total'] ?? null);
		$instance->setUnrated(Unrated::fromJson($data['unrated']));
		return $instance;
	}
}
