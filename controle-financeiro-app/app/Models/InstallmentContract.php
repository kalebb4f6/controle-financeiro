<?php

namespace App\Models;

class InstallmentContract extends UuidModel
{
    protected $table = 'installments_contracts';
    protected $fillable = [
        'id',
        'installments_number',
        'first_due_date',
    ];
}
