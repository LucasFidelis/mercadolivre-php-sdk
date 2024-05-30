<?php

namespace LucasFidelis\MercadoLivreSdk\Entities;

class User extends DataObject
{
    protected array $schema = [
        'id' => 'numeric',
        'nickname' => 'string',
        'registration_date' => 'numeric',
        'first_name' => 'string',
        'last_name' => 'string'
    ];
}