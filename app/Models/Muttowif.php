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

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function getNameAttribute()
    {
        return 'Pemesanan Muttowif - ' . $this->start_date . ' s/d ' . $this->end_date;
    }

    public function transactionItem()
    {
        return $this->morphOne(TransactionItem::class, 'itemable');
    }
}
