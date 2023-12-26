<?php

namespace App\Adapters\Financial;

use App\Contracts\Services\FinancialCreateServiceInterface;
use App\Enums\FinancialStatusEnum;
use App\Repositories\FinancialRepository;
use App\Repositories\InstallmentContractRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class InstallmentsCreateAdapter implements FinancialCreateServiceInterface
{
    public function __construct(
        private InstallmentContractRepository $installmentContractRepository,
        private FinancialRepository $financialRepository
    ) {
    }

    public function create(array $data)
    {
        $installments = Arr::get($data, 'installments', 0);
        $firstDate = Arr::get($data, 'date');

        return DB::transaction(function () use ($data, $installments, $firstDate) {
            $firstInstallment = null;
            $installmentContract = $this->installmentContractRepository->create([
                'installments_number' => $installments,
                'first_due_date' => $firstDate,
            ]);
            $data['installment_contract_id'] = $installmentContract->id;
            $description = Arr::get($data, 'description', '');
            for ($i = 1; $i <= $installments; $i++) {
                $data['description'] = "{$description} {$i}/{$installments}";
                $auxF = $this->financialRepository->create($data);

                if ($i === 1) {
                    $firstInstallment = $auxF;
                }
                $data['status'] = FinancialStatusEnum::PENDING;
                $data['date'] = $firstDate->addMonth();
            }

            return $firstInstallment;
        });
    }
}
