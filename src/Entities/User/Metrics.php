<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Metrics
{
	private Sales $sales;
	private Claims $claims;
	private DelayedHandlingTime $delayedHandlingTime;
	private Cancellations $cancellations;

	public function getSales(): Sales
	{
		return $this->sales;
	}

	public function getClaims(): Claims
	{
		return $this->claims;
	}

	public function getDelayedHandlingTime(): DelayedHandlingTime
	{
		return $this->delayedHandlingTime;
	}

	public function getCancellations(): Cancellations
	{
		return $this->cancellations;
	}

	public function setSales(Sales $sales): self
	{
		$this->sales = $sales;
		return $this;
	}

	public function setClaims(Claims $claims): self
	{
		$this->claims = $claims;
		return $this;
	}

	public function setDelayedHandlingTime(DelayedHandlingTime $delayedHandlingTime): self
	{
		$this->delayedHandlingTime = $delayedHandlingTime;
		return $this;
	}

	public function setCancellations(Cancellations $cancellations): self
	{
		$this->cancellations = $cancellations;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setSales(Sales::fromJson($data['sales']));
		$instance->setClaims(Claims::fromJson($data['claims']));
		$instance->setDelayedHandlingTime(DelayedHandlingTime::fromJson($data['delayed_handling_time']));
		$instance->setCancellations(Cancellations::fromJson($data['cancellations']));
		return $instance;
	}
}
