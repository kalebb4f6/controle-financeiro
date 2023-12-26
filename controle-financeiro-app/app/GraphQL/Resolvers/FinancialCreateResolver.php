<?php

namespace App\GraphQL\Resolvers;

use App\Services\FinancialService;

/**
 *
 */
class FinancialCreateResolver
{
    /**
     * @param FinancialService $financialService
     */
    public function __construct(private FinancialService $financialService)
    {
    }

    /**
     * @param mixed $root
     * @param array $args
     *
     * @return mixed
     */
    public function __invoke(mixed $root, array $args)
    {
        return $this->financialService->create($args);
    }
}
