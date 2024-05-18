<?php

namespace LucasFidelis\MercadoLivreSdk\Entities\User;

class Status
{
	private Billing $billing;
	private Buy $buy;
	private bool $confirmedEmail;
	private ShoppingCart $shoppingCart;
	private bool $immediatePayment;
	private ListObject $list;
	private string $mercadoenvios;
	private string $mercadopagoAccountType;
	private bool $mercadopagoTcAccepted;
	private null $requiredAction;
	private Sell $sell;
	private string $siteStatus;
	private string $userType;

	public function getBilling(): Billing
	{
		return $this->billing;
	}

	public function getBuy(): Buy
	{
		return $this->buy;
	}

	public function getConfirmedEmail(): bool
	{
		return $this->confirmedEmail;
	}

	public function getShoppingCart(): ShoppingCart
	{
		return $this->shoppingCart;
	}

	public function getImmediatePayment(): bool
	{
		return $this->immediatePayment;
	}

	public function getList(): ListObject
	{
		return $this->list;
	}

	public function getMercadoenvios(): string
	{
		return $this->mercadoenvios;
	}

	public function getMercadopagoAccountType(): string
	{
		return $this->mercadopagoAccountType;
	}

	public function getMercadopagoTcAccepted(): bool
	{
		return $this->mercadopagoTcAccepted;
	}

	public function getRequiredAction(): null
	{
		return $this->requiredAction;
	}

	public function getSell(): Sell
	{
		return $this->sell;
	}

	public function getSiteStatus(): string
	{
		return $this->siteStatus;
	}

	public function getUserType(): string
	{
		return $this->userType;
	}

	public function setBilling(Billing $billing): self
	{
		$this->billing = $billing;
		return $this;
	}

	public function setBuy(Buy $buy): self
	{
		$this->buy = $buy;
		return $this;
	}

	public function setConfirmedEmail(bool $confirmedEmail): self
	{
		$this->confirmedEmail = $confirmedEmail;
		return $this;
	}

	public function setShoppingCart(ShoppingCart $shoppingCart): self
	{
		$this->shoppingCart = $shoppingCart;
		return $this;
	}

	public function setImmediatePayment(bool $immediatePayment): self
	{
		$this->immediatePayment = $immediatePayment;
		return $this;
	}

	public function setList(ListObject $list): self
	{
		$this->list = $list;
		return $this;
	}

	public function setMercadoenvios(string $mercadoenvios): self
	{
		$this->mercadoenvios = $mercadoenvios;
		return $this;
	}

	public function setMercadopagoAccountType(string $mercadopagoAccountType): self
	{
		$this->mercadopagoAccountType = $mercadopagoAccountType;
		return $this;
	}

	public function setMercadopagoTcAccepted(bool $mercadopagoTcAccepted): self
	{
		$this->mercadopagoTcAccepted = $mercadopagoTcAccepted;
		return $this;
	}

	public function setRequiredAction(null $requiredAction): self
	{
		$this->requiredAction = $requiredAction;
		return $this;
	}

	public function setSell(Sell $sell): self
	{
		$this->sell = $sell;
		return $this;
	}

	public function setSiteStatus(string $siteStatus): self
	{
		$this->siteStatus = $siteStatus;
		return $this;
	}

	public function setUserType(string $userType): self
	{
		$this->userType = $userType;
		return $this;
	}

	public static function fromJson(array $data): self
	{
		$instance = new self();
		$instance->setBilling(Billing::fromJson($data['billing']));
		$instance->setBuy(Buy::fromJson($data['buy']));
		$instance->setConfirmedEmail($data['confirmed_email']);
		$instance->setShoppingCart(ShoppingCart::fromJson($data['shopping_cart']));
		$instance->setImmediatePayment($data['immediate_payment']);
		$instance->setList(ListObject::fromJson($data['list']));
		$instance->setMercadoenvios($data['mercadoenvios']);
		$instance->setMercadopagoAccountType($data['mercadopago_account_type']);
		$instance->setMercadopagoTcAccepted($data['mercadopago_tc_accepted']);
		$instance->setRequiredAction($data['required_action'] ?? null);
		$instance->setSell(Sell::fromJson($data['sell']));
		$instance->setSiteStatus($data['site_status']);
		$instance->setUserType($data['user_type']);
		return $instance;
	}
}
