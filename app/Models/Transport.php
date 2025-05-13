<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    //
    protected $fillable = ['name', 'description', 'type', 'route', 'schedule'];

    public function images()
    {
        return $this->hasMany(TransportImages::class);
    }

    public function prices()
    {
        return $this->hasMany(TransportPrices::class);
    }

    public function periods()
    {
        return $this->hasMany(Period::class);
    }
}
