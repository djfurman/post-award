<?php

namespace App\Security;

use App\UuidModel;

class AccessRequest extends UuidModel
{
    protected $fillable = [
        'type',
        'system',
        'system_location',
        'request_at',
        'ldap'
    ];
}
