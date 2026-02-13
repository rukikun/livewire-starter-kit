<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'category_name',
        'document_name',
        'url',
        'document_year',
        'document_month_id',
        'document_date',
        'is_admin',
    ];

    protected $casts = [
        'document_date' => 'date',
        'document_year' => 'integer',
        'is_admin' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function month(): BelongsTo
    {
        return $this->belongsTo(Month::class, 'document_month_id');
    }
}
