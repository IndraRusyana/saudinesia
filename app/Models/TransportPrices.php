<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportPrices extends Model
{
    protected $fillable = ['transport_id', 'period_id', 'price'];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
