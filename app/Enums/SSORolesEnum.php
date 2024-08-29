<?php

namespace App\Enums;

enum SSORolesEnum: int
{
    case SUPER_USER = 1;
    case TENANT_ADMIN = 2;
    case TENANT_SUPERVISOR = 3;
    case TENANT_USER = 4;
}
