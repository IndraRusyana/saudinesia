<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportImages extends Model
{
        protected $fillable = [
        'transport_id', 'image_path'
    ];

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
