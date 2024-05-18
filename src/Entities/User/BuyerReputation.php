<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class BuyerReputation
{
	private int $canceledTransactions;
	private array $tags;
	private Transactions $transactions;

	public function getCanceledTransactions(): int
	{
		return $this->canceledTransactions;
	}

	public function getTags(): array
	{
		return $this->tags;
	}

	public function getTransactions(): Transactions
	{
		return $this->transactions;
	}

	public function setCanceledTransactions(int $canceledTransactions): self
	{
		$this->canceledTransactions = $canceledTransactions;
		return $this;
	}

	public function setTags(array $tags): self
	{
		$this->tags = $tags;
		return $this;
	}

	public function setTransactions(Transactions $transactions): self
	{
		$this->transactions = $transactions;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setCanceledTransactions($data['canceled_transactions']);
		$instance->setTags($data['tags']);
		$instance->setTransactions(Transactions::fromJson($data['transactions']));
		return $instance;
	}
}
