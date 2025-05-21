<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date'];

    public function hotelPrices()
    {
        return $this->hasMany(HotelPrice::class);
    }

    public function transportPrices()
    {
        return $this->hasMany(TransportPrices::class);
    }

    public function getFormattedStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->translatedFormat('d F Y');
    }

    public function getFormattedEndDateAttribute()
    {
        return Carbon::parse($this->end_date)->translatedFormat('d F Y');
    }
}
