<?php

namespace LucasFidelis\MercadoLivreSdk\Entities;

use LucasFidelis\MercadoLivreSdk\Entities\User\Address;
use LucasFidelis\MercadoLivreSdk\Entities\User\AlternativePhone;
use LucasFidelis\MercadoLivreSdk\Entities\User\BillData;
use LucasFidelis\MercadoLivreSdk\Entities\User\BuyerReputation;
use LucasFidelis\MercadoLivreSdk\Entities\User\Company;
use LucasFidelis\MercadoLivreSdk\Entities\User\Context;
use LucasFidelis\MercadoLivreSdk\Entities\User\Credit;
use LucasFidelis\MercadoLivreSdk\Entities\User\Identification;
use LucasFidelis\MercadoLivreSdk\Entities\User\Phone;
use LucasFidelis\MercadoLivreSdk\Entities\User\SellerReputation;
use LucasFidelis\MercadoLivreSdk\Entities\User\Status;
use LucasFidelis\MercadoLivreSdk\Entities\User\Thumbnail;

class User
{
    private int $id;
    private string $nickname;
    private string $registrationDate;
    private string $firstName;
    private string $lastName;
    private string $gender;
    private string $countryId;
    private string $email;
    private Identification $identification;
    private Address $address;
    private Phone $phone;
    private AlternativePhone $alternativePhone;
    private string $userType;
    /** @var string[] */
    private array $tags;
    private null $logo;
    private int $points;
    private string $siteId;
    private string $permalink;
    private string $sellerExperience;
    private BillData $billData;
    private SellerReputation $sellerReputation;
    private BuyerReputation $buyerReputation;
    private Status $status;
    private string $secureEmail;
    private Company $company;
    private Credit $credit;
    private Context $context;
    private Thumbnail $thumbnail;
    private array $registrationIdentifiers;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function getRegistrationDate(): string
    {
        return $this->registrationDate;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getCountryId(): string
    {
        return $this->countryId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getIdentification(): Identification
    {
        return $this->identification;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function getAlternativePhone(): AlternativePhone
    {
        return $this->alternativePhone;
    }

    public function getUserType(): string
    {
        return $this->userType;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    public function getLogo(): null
    {
        return $this->logo;
    }

    public function getPoints(): int
    {
        return $this->points;
    }

    public function getSiteId(): string
    {
        return $this->siteId;
    }

    public function getPermalink(): string
    {
        return $this->permalink;
    }

    public function getSellerExperience(): string
    {
        return $this->sellerExperience;
    }

    public function getBillData(): BillData
    {
        return $this->billData;
    }

    public function getSellerReputation(): SellerReputation
    {
        return $this->sellerReputation;
    }

    public function getBuyerReputation(): BuyerReputation
    {
        return $this->buyerReputation;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getSecureEmail(): string
    {
        return $this->secureEmail;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function getCredit(): Credit
    {
        return $this->credit;
    }

    public function getContext(): Context
    {
        return $this->context;
    }

    public function getThumbnail(): Thumbnail
    {
        return $this->thumbnail;
    }

    public function getRegistrationIdentifiers(): array
    {
        return $this->registrationIdentifiers;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;
        return $this;
    }

    public function setRegistrationDate(string $registrationDate): self
    {
        $this->registrationDate = $registrationDate;
        return $this;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;
        return $this;
    }

    public function setCountryId(string $countryId): self
    {
        $this->countryId = $countryId;
        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setIdentification(Identification $identification): self
    {
        $this->identification = $identification;
        return $this;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;
        return $this;
    }

    public function setPhone(Phone $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function setAlternativePhone(AlternativePhone $alternativePhone): self
    {
        $this->alternativePhone = $alternativePhone;
        return $this;
    }

    public function setUserType(string $userType): self
    {
        $this->userType = $userType;
        return $this;
    }

    /**
     * @param string[] $tags
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    public function setLogo(null $logo): self
    {
        $this->logo = $logo;
        return $this;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;
        return $this;
    }

    public function setSiteId(string $siteId): self
    {
        $this->siteId = $siteId;
        return $this;
    }

    public function setPermalink(string $permalink): self
    {
        $this->permalink = $permalink;
        return $this;
    }

    public function setSellerExperience(string $sellerExperience): self
    {
        $this->sellerExperience = $sellerExperience;
        return $this;
    }

    public function setBillData(BillData $billData): self
    {
        $this->billData = $billData;
        return $this;
    }

    public function setSellerReputation(SellerReputation $sellerReputation): self
    {
        $this->sellerReputation = $sellerReputation;
        return $this;
    }

    public function setBuyerReputation(BuyerReputation $buyerReputation): self
    {
        $this->buyerReputation = $buyerReputation;
        return $this;
    }

    public function setStatus(Status $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function setSecureEmail(string $secureEmail): self
    {
        $this->secureEmail = $secureEmail;
        return $this;
    }

    public function setCompany(Company $company): self
    {
        $this->company = $company;
        return $this;
    }

    public function setCredit(Credit $credit): self
    {
        $this->credit = $credit;
        return $this;
    }

    public function setContext(Context $context): self
    {
        $this->context = $context;
        return $this;
    }

    public function setThumbnail(Thumbnail $thumbnail): self
    {
        $this->thumbnail = $thumbnail;
        return $this;
    }

    public function setRegistrationIdentifiers(array $registrationIdentifiers): self
    {
        $this->registrationIdentifiers = $registrationIdentifiers;
        return $this;
    }

    public static function fromJson(array $data): self
    {
        $instance = new self();
        $instance->setId($data['id']);
        $instance->setNickname($data['nickname']);
        // $instance->setRegistrationDate($data['registration_date']);
        // $instance->setFirstName($data['first_name']);
        // $instance->setLastName($data['last_name']);
        // $instance->setGender($data['gender']);
        // $instance->setCountryId($data['country_id']);
        // $instance->setEmail($data['email']);
        // $instance->setIdentification(Identification::fromJson($data['identification']));
        // $instance->setAddress(Address::fromJson($data['address']));
        // $instance->setPhone(Phone::fromJson($data['phone']));
        // $instance->setAlternativePhone(AlternativePhone::fromJson($data['alternative_phone']));
        // $instance->setUserType($data['user_type']);
        // $instance->setTags($data['tags']);
        // $instance->setLogo($data['logo'] ?? null);
        // $instance->setPoints($data['points']);
        // $instance->setSiteId($data['site_id']);
        // $instance->setPermalink($data['permalink']);
        // $instance->setSellerExperience($data['seller_experience']);
        // $instance->setBillData(BillData::fromJson($data['bill_data']));
        // $instance->setSellerReputation(SellerReputation::fromJson($data['seller_reputation']));
        // $instance->setBuyerReputation(BuyerReputation::fromJson($data['buyer_reputation']));
        // $instance->setStatus(Status::fromJson($data['status']));
        // $instance->setSecureEmail($data['secure_email']);
        // $instance->setCompany(Company::fromJson($data['company']));
        // $instance->setCredit(Credit::fromJson($data['credit']));
        // $instance->setContext(Context::fromJson($data['context']));
        // $instance->setThumbnail(Thumbnail::fromJson($data['thumbnail']));
        // $instance->setRegistrationIdentifiers($data['registration_identifiers']);
        return $instance;
    }
}
