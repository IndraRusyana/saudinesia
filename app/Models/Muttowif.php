<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muttowif extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'start_date', 'end_date', 'jamaah_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Optional: akses alias untuk created_at
    public function getTanggalPemesananAttribute()
    {
        return $this->created_at;
    }
}
