<?php

namespace App\Enums;

enum TenantStatus: String
{
    case TRIAL = 'TRIAL';
    case ACTIVE = 'ACTIVE';
    case PENDING = 'PENDING';
    case INACTIVE = 'INACTIVE';
}
