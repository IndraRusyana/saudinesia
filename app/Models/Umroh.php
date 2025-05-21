<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Umroh extends Model
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
