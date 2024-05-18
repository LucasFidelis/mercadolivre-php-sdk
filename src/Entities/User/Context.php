<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Context
{
	private string $device;
	private string $flow;
	private string $ipAddress;
	private string $source;

	public function getDevice(): string
	{
		return $this->device;
	}

	public function getFlow(): string
	{
		return $this->flow;
	}

	public function getIpAddress(): string
	{
		return $this->ipAddress;
	}

	public function getSource(): string
	{
		return $this->source;
	}

	public function setDevice(string $device): self
	{
		$this->device = $device;
		return $this;
	}

	public function setFlow(string $flow): self
	{
		$this->flow = $flow;
		return $this;
	}

	public function setIpAddress(string $ipAddress): self
	{
		$this->ipAddress = $ipAddress;
		return $this;
	}

	public function setSource(string $source): self
	{
		$this->source = $source;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setDevice($data['device']);
		$instance->setFlow($data['flow']);
		$instance->setIpAddress($data['ip_address']);
		$instance->setSource($data['source']);
		return $instance;
	}
}
