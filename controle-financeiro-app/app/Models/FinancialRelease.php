<?php

namespace App\Models;

use App\Enums\FinancialStatusEnum;
use App\Enums\FinancialTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinancialRelease extends UuidModel
{
    use HasFactory;
    protected $fillable = [
        'id',
        'customer_id',
        'bank_account_id',
        'credit_card_id',
        'installment_contract_id',
        'category_id',
        'status',
        'type',
        'description',
        'value',
        'date',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'value' => 'float',
        'date' => 'date',
        'status' => FinancialStatusEnum::class,
        'type' => FinancialTypeEnum::class,
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creditCard(): BelongsTo
    {
        return $this->belongsTo(CreditCard::class);
    }
}
