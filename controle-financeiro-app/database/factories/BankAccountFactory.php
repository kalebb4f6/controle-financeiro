<?php

namespace Database\Factories;

use App\Models\BankAccount;
use App\Models\FinancialRelease;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;

class BankAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BankAccount::class;
    protected $afterCreating = [];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->name,
            'start_balance' => $this->faker->randomFloat(2, 0, 10000),
//            fn (array $attr) => dd($attr)
//        FinancialRelease::factory(10)->create([
//                "bank_account_id" => $attr["id"] ?? null,
//            ])
        ];
    }
}
