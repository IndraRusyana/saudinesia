<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = ['name'];

    public function prices()
    {
        return $this->hasMany(HotelPrice::class);
    }
}
