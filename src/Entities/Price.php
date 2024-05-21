<?php

namespace LucasFidelis\MercadoLivreSdk\Entities;

class Price implements \JsonSerializable
{
    public string $id;
    public string $type;
    public float $amount;
    public ?float $regularAmount;
    public string $currencyId;
    public string $lastUpdated;

    public function __construct(
        string $id,
        string $type,
        float $amount,
        ?float $regularAmount,
        string $currencyId,
        string $lastUpdated
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->amount = $amount;
        $this->regularAmount = $regularAmount;
        $this->currencyId = $currencyId;
        $this->lastUpdated = $lastUpdated;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getRegularAmount(): ?float
    {
        return $this->regularAmount;
    }

    public function getCurrencyId(): string
    {
        return $this->currencyId;
    }

    public function getLastUpdated(): string
    {
        return $this->lastUpdated;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function setRegularAmount(?float $regularAmount): self
    {
        $this->regularAmount = $regularAmount;
        return $this;
    }

    public function setCurrencyId(string $currencyId): self
    {
        $this->currencyId = $currencyId;
        return $this;
    }

    public function setLastUpdated(string $lastUpdated): self
    {
        $this->lastUpdated = $lastUpdated;
        return $this;
    }

    public static function fromJson(array $data): self
    {
        return new self(
            $data['id'],
            $data['type'],
            $data['amount'],
            $data['regular_amount'] ?? null,
            $data['currency_id'],
            $data['last_updated']
        );
    }

    public function jsonSerialize(): mixed
    {
        $data = [];
        $vars = get_object_vars($this);
        foreach ($vars as $key => $value) {
            $key = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key));
            $data[$key] = $value;
        }
        return $data;
    }
}
