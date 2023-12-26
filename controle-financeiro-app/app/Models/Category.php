<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends UuidModel
{
    use HasFactory;
    protected $fillable = [
        'id',
        'parent_category_id',
        'name',
        'icon',
        'created_at',
        'updated_at',
    ];

    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
