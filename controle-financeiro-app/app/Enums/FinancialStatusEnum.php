<?php

namespace App\Enums;

enum FinancialStatusEnum: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case CANCELED = 'canceled';
}
