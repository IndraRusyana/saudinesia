<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelPrice extends Model
{
    protected $fillable = [
        'hotel_id', 'period_id', 'room_type_id', 'price'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
