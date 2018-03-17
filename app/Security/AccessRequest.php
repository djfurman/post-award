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
        'ldap',
        'mfa',
        'given_name',
        'surname',
        'middle_initial',
        'street_line_1',
        'street_line_2',
        'city',
        'state',
        'country',
        'planet'
    ];
}
