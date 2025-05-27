<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'itemable_type',
        'itemable_id',
        'description',
        'quantity',
        'unit_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itemable()
    {
        return $this->morphTo();
    }

    public function getTotalAttribute()
    {
        return $this->quantity * $this->unit_price;
    }
}
