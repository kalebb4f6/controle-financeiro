<?php

namespace App\Providers;

use App\Adapters\Financial\FinancialCreateAdapter;
use App\Adapters\Financial\InstallmentsCreateAdapter;
use App\Contracts\Repositories\FinancialRepositoryInterface;
use App\Contracts\Repositories\InstallmentsContractRepositoryInterface;
use App\Repositories\FinancialRepository;
use App\Repositories\InstallmentContractRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(FinancialRepositoryInterface::class, FinancialRepository::class);
        $this->app->singleton(InstallmentsContractRepositoryInterface::class, InstallmentContractRepository::class);

        $this->app->singleton(FinancialCreateAdapter::class, FinancialCreateAdapter::class);
        $this->app->singleton(InstallmentsCreateAdapter::class, InstallmentsCreateAdapter::class);
    }
}
