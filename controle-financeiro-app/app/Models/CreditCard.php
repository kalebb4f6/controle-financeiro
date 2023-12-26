<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CreditCard extends UuidModel
{
    protected $fillable = [
        'id',
        'customer_id',
        'bank_account_id',
        'name',
        'flag',
        'day_of_close',
        'preferential',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'limit' => 'float',
        'closing' => 'date',
        'due' => 'date',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }
}
