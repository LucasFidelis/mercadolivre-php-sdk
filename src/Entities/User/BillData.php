<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class BillData
{
	private string $acceptCreditNote;

	public function getAcceptCreditNote(): string
	{
		return $this->acceptCreditNote;
	}

	public function setAcceptCreditNote(string $acceptCreditNote): self
	{
		$this->acceptCreditNote = $acceptCreditNote;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setAcceptCreditNote($data['accept_credit_note']);
		return $instance;
	}
}
