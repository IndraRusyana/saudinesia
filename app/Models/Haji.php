<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haji extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'prices', 'images', 'land_arrangement_id'];

    public function landArrangement()
    {
        return $this->belongsTo(LandArrangement::class);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}
