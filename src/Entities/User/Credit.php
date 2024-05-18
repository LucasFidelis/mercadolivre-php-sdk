<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Credit
{
	private int $consumed;
	private string $creditLevelId;
	private string $rank;

	public function getConsumed(): int
	{
		return $this->consumed;
	}

	public function getCreditLevelId(): string
	{
		return $this->creditLevelId;
	}

	public function getRank(): string
	{
		return $this->rank;
	}

	public function setConsumed(int $consumed): self
	{
		$this->consumed = $consumed;
		return $this;
	}

	public function setCreditLevelId(string $creditLevelId): self
	{
		$this->creditLevelId = $creditLevelId;
		return $this;
	}

	public function setRank(string $rank): self
	{
		$this->rank = $rank;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setConsumed($data['consumed']);
		$instance->setCreditLevelId($data['credit_level_id']);
		$instance->setRank($data['rank']);
		return $instance;
	}
}
