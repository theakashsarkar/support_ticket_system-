<?php

namespace App\Enums;

enum UserRole: string
{
    case Admin = 'admin';
    case AGENT = 'agent';
    case CUSTOMER = 'customer';
}