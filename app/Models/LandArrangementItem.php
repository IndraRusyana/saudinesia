<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LandArrangementItem extends Model
{
    use HasFactory;

    protected $fillable = ['land_arrangement_id', 'serviceable_type', 'serviceable_id', 'custom_name', 'keterangan', 'type'];

    public function landArrangement()
    {
        return $this->belongsTo(LandArrangement::class);
    }

    public function serviceable()
    {
        return $this->morphTo();
    }
}
