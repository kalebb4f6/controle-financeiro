<?php

namespace Database\Factories;

use App\Enums\FinancialStatusEnum;
use App\Enums\FinancialTypeEnum;
use App\Models\BankAccount;
use App\Models\Category;
use App\Models\Customer;
use App\Models\FinancialRelease;
use Illuminate\Database\Eloquent\Factories\Factory;

class FinancialReleaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FinancialRelease::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
//            "customer_id" => $this->faker->randomElement(Customer::all()->pluck("id")->toArray()),
            'status' => $this->faker->randomElement(array_column(FinancialStatusEnum::cases(), "value")),
            'type' => $this->faker->randomElement(array_column(FinancialTypeEnum::cases(), "value")),
            'description' => $this->faker->name,
            'value' => $this->faker->randomFloat(2, 0, 100),
            'date' => $this->faker->dateTimeBetween("-120 days"),
            'category_id' => Category::all()->random()->id,
            'bank_account_id' => $this->faker->randomElement(BankAccount::all()->pluck("id")->toArray()),
        ];
    }
}
