<?php

namespace App\Repositories;

use App\Contracts\Repositories\InstallmentsContractRepositoryInterface;
use App\Models\InstallmentContract;

class InstallmentContractRepository implements InstallmentsContractRepositoryInterface
{
    public function create(array $data): InstallmentContract
    {
        return InstallmentContract::create($data);
    }
}
