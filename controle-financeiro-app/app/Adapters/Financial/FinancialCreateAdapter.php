<?php

namespace App\Adapters\Financial;

use App\Contracts\Services\FinancialCreateServiceInterface;
use App\Models\FinancialRelease;

class FinancialCreateAdapter implements FinancialCreateServiceInterface
{
    public function create(array $data)
    {
        return FinancialRelease::create($data);
    }
}
