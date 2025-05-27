<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LandArrangement extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function items()
    {
        return $this->hasMany(LandArrangementItem::class);
    }

    public function hajis()
    {
        return $this->hasMany(Haji::class);
    }

    public function umrohs()
    {
        return $this->hasMany(Umroh::class);
    }
}
