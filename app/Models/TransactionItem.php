<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'itemable_type',
        'itemable_id',
        'description',
        'quantity',
        'unit_price',
        'total_price',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function itemable()
    {
        return $this->morphTo();
    }
}
