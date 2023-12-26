<?php

namespace App\Models;

use App\Enums\FinancialStatusEnum;
use App\Enums\FinancialTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends UuidModel
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'description',
        'start_balance',
    ];

    protected $casts = [
        'start_balance' => 'float',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function financials(): HasMany
    {
        return $this->hasMany(FinancialRelease::class);
    }
    public function financialReleases(): HasManyThrough
    {
        return $this->hasManyThrough(FinancialRelease::class, CreditCard::class, 'bank_account_id', 'credit_card_id');
    }
    public function creditCardFinancials(): HasManyThrough
    {
        return $this->hasManyThrough(
            FinancialRelease::class,
            CreditCard::class,
            'bank_account_id',
            'credit_card_id'
        );
    }
    public function expanseFinancials(): HasMany
    {
        return $this->hasMany(FinancialRelease::class)
            ->where('type', FinancialTypeEnum::EXPENSE);
    }
    public function expanseFinancialsPaid(): HasMany
    {
        return $this->hasMany(FinancialRelease::class)
            ->where('status', FinancialStatusEnum::PAID)
            ->where('type', FinancialTypeEnum::EXPENSE);
    }

    public function revenueFinancials(): HasMany
    {
        return $this->hasMany(FinancialRelease::class)
            ->where('type', FinancialTypeEnum::REVENUE);
    }

    public function revenueFinancialsPaid(): HasMany
    {
        return $this->hasMany(FinancialRelease::class)
            ->where('status', FinancialStatusEnum::PAID)
            ->where('type', FinancialTypeEnum::REVENUE);
    }
}
