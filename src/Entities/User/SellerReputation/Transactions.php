<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User\SellerReputation;

use LucasFidelis\MercadoLivreSdk\Entities\User\Ratings;

class Transactions
{
    private int $canceled;
    private int $completed;
    private string $period;
    private Ratings $ratings;
    private int $total;

    public function getCanceled(): int
    {
        return $this->canceled;
    }

    public function getCompleted(): int
    {
        return $this->completed;
    }

    public function getPeriod(): string
    {
        return $this->period;
    }

    public function getRatings(): Ratings
    {
        return $this->ratings;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setCanceled(int $canceled): self
    {
        $this->canceled = $canceled;
        return $this;
    }

    public function setCompleted(int $completed): self
    {
        $this->completed = $completed;
        return $this;
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;
        return $this;
    }

    public function setRatings(Ratings $ratings): self
    {
        $this->ratings = $ratings;
        return $this;
    }

    public function setTotal(int $total): self
    {
        $this->total = $total;
        return $this;
    }

    public static function fromJson(array $data): self
    {
        $instance = new self();
        $instance->setCanceled($data['canceled']);
        $instance->setCompleted($data['completed']);
        $instance->setPeriod($data['period']);
        $instance->setRatings(Ratings::fromJson($data['ratings']));
        $instance->setTotal($data['total']);
        return $instance;
    }
}
