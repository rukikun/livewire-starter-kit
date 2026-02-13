<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Month extends Model
{
    protected $fillable = [
        'name',
        'month_number',
    ];

    protected $casts = [
        'month_number' => 'integer',
    ];

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'document_month_id');
    }
}
