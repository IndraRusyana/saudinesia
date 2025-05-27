<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    //
    protected $fillable = ['name', 'description', 'type','route_id'];

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

    public function routes()
    {
        return $this->belongsTo(TransportRoutes::class, 'route_id');
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}
