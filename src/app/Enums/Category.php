<?php
namespace App\Enums;

enum Category: string
{
    case Technical = 'technical';
    case Billing  = 'billing';
    case General = 'general';
}