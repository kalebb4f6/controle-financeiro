<?php

namespace App\Services;

use App\Adapters\Financial\FinancialCreateAdapter;
use App\Adapters\Financial\InstallmentsCreateAdapter;
use App\Contracts\Services\FinancialCreateServiceInterface;
use Illuminate\Support\Arr;

/**
 *
 */
class FinancialService implements FinancialCreateServiceInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->getCreateAdapter($data)->create($data);
    }

    /**
     * @param array $data
     *
     * @return FinancialCreateServiceInterface
     */
    private function getCreateAdapter(array $data): FinancialCreateServiceInterface
    {
        $installments = Arr::get($data, 'installments', false);

        if ($installments) {
            return app()->make(InstallmentsCreateAdapter::class);
        }
        return app()->make(FinancialCreateAdapter::class);
    }
}
