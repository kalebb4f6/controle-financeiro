<?php

namespace App\Repositories;

use App\Contracts\Repositories\FinancialRepositoryInterface;
use App\Models\FinancialRelease;

class FinancialRepository implements FinancialRepositoryInterface
{
    public function create(array $data)
    {
        return FinancialRelease::create($data);
    }
}
