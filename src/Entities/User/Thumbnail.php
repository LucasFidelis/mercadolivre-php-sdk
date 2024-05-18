<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Thumbnail
{
	private string $pictureId;
	private string $pictureUrl;

	public function getPictureId(): string
	{
		return $this->pictureId;
	}

	public function getPictureUrl(): string
	{
		return $this->pictureUrl;
	}

	public function setPictureId(string $pictureId): self
	{
		$this->pictureId = $pictureId;
		return $this;
	}

	public function setPictureUrl(string $pictureUrl): self
	{
		$this->pictureUrl = $pictureUrl;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setPictureId($data['picture_id']);
		$instance->setPictureUrl($data['picture_url']);
		return $instance;
	}
}
