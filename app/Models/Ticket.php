<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'concert_id',
        'cat_id',
        'quantity',
        'date',
    ];

    public function concert(): BelongsTo
    {
        return $this->belongsTo(Concert::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CatType::class, 'cat_id');
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
