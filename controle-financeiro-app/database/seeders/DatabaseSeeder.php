<?php

namespace Database\Seeders;

use App\Models\BankAccount;
use App\Models\Customer;
use App\Models\FinancialRelease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
//        $this->call(BankAccountSeeder::class);
//        Customer::factory(3)->create();
        FinancialRelease::factory(2000)->create();
//        BankAccount::factory(5)->has(
//            FinancialRelease::factory(500)->state(function (array $attributes, BankAccount $bankAccount) {
//                return [
//                    "bank_account_id" => $bankAccount->id,
//                ];
//            })
//        )->create();
//        FinancialRelease::factory(100)->create();
//        BankAccount::factory(5)->has(
//            FinancialRelease::factory(200)->
//        )->create();
    }
}
