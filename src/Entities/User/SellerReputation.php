<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

use LucasFidelis\MercadoLivreSdk\Entities\User\SellerReputation\Transactions;

class SellerReputation
{
	private string $levelId;
	private ?string $powerSellerStatus;
	private string $realLevel;
	private string $protectionEndDate;
	private Transactions $transactions;
	private Metrics $metrics;

	public function getLevelId(): string
	{
		return $this->levelId;
	}

	public function getPowerSellerStatus(): ?string
	{
		return $this->powerSellerStatus;
	}

	public function getRealLevel(): string
	{
		return $this->realLevel;
	}

	public function getProtectionEndDate(): string
	{
		return $this->protectionEndDate;
	}

	public function getTransactions(): Transactions
	{
		return $this->transactions;
	}

	public function getMetrics(): Metrics
	{
		return $this->metrics;
	}

	public function setLevelId(string $levelId): self
	{
		$this->levelId = $levelId;
		return $this;
	}

	public function setPowerSellerStatus(?string $powerSellerStatus): self
	{
		$this->powerSellerStatus = $powerSellerStatus;
		return $this;
	}

	public function setRealLevel(string $realLevel): self
	{
		$this->realLevel = $realLevel;
		return $this;
	}

	public function setProtectionEndDate(string $protectionEndDate): self
	{
		$this->protectionEndDate = $protectionEndDate;
		return $this;
	}

	public function setTransactions(Transactions $transactions): self
	{
		$this->transactions = $transactions;
		return $this;
	}

	public function setMetrics(Metrics $metrics): self
	{
		$this->metrics = $metrics;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setLevelId($data['level_id']);
		// $instance->setPowerSellerStatus($data['power_seller_status']);
		// $instance->setRealLevel($data['real_level']);
		// $instance->setProtectionEndDate($data['protection_end_date']);
		$instance->setTransactions(Transactions::fromJson($data['transactions']));
		$instance->setMetrics(Metrics::fromJson($data['metrics']));
		return $instance;
	}
}
