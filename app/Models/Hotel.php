<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $fillable = ['name', 'address', 'description', 'map_url','city_id'];

    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }

    public function prices()
    {
        return $this->hasMany(HotelPrice::class);
    }

    public function periods()
    {
        return $this->hasMany(Period::class);
    }

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }
}
