<?php

namespace LucasFidelis\MercadoLivreSdk\Entities;

use LucasFidelis\MercadoLivreSdk\Entities\BillingInfo\AdditionalInfo;

class BillingInfo extends DataObject
{
    protected array $schema = [
        'additional_info' => 'array'
    ];

    protected array $collections = [
        'additional_info' => AdditionalInfo::class
    ];

    /**
     * @return AdditionalInfo[]
     */
    public function getAdditionalInfo(): array
    {
        return $this->getData('additional_info');
    }
}
