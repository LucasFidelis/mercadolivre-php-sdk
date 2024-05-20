<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\Product;

class Pictures
{
	public string $id;
	public string $url;
	public string $secureUrl;
	public string $size;
	public string $maxSize;
	public string $quality;

	public function __construct(
		string $id,
		string $url,
		string $secureUrl,
		string $size,
		string $maxSize,
		string $quality
	) {
		$this->id = $id;
		$this->url = $url;
		$this->secureUrl = $secureUrl;
		$this->size = $size;
		$this->maxSize = $maxSize;
		$this->quality = $quality;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function getUrl(): string
	{
		return $this->url;
	}

	public function getSecureUrl(): string
	{
		return $this->secureUrl;
	}

	public function getSize(): string
	{
		return $this->size;
	}

	public function getMaxSize(): string
	{
		return $this->maxSize;
	}

	public function getQuality(): string
	{
		return $this->quality;
	}

	public function setId(string $id): self
	{
		$this->id = $id;
		return $this;
	}

	public function setUrl(string $url): self
	{
		$this->url = $url;
		return $this;
	}

	public function setSecureUrl(string $secureUrl): self
	{
		$this->secureUrl = $secureUrl;
		return $this;
	}

	public function setSize(string $size): self
	{
		$this->size = $size;
		return $this;
	}

	public function setMaxSize(string $maxSize): self
	{
		$this->maxSize = $maxSize;
		return $this;
	}

	public function setQuality(string $quality): self
	{
		$this->quality = $quality;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		return new self(
			$data['id'],
			$data['url'],
			$data['secure_url'],
			$data['size'],
			$data['max_size'],
			$data['quality']
		);
	}
}
