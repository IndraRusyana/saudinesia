<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    protected $fillable = ['user_id', 'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'pekerjaan', 'no_hp', 'no_paspor', 'paspor_terbit', 'paspor_kadaluarsa', 'wilayah_terbit', 'tanggal_berangkat', 'maskapai_berangkat', 'no_penerbangan_berangkat', 'tanggal_kembali', 'maskapai_kembali', 'no_penerbangan_kembali', 'hotel_mekkah', 'checkin_mekkah', 'checkout_mekkah', 'hotel_madinah', 'checkin_madinah', 'checkout_madinah', 'lampiran_ktp', 'lampiran_paspor', 'lampiran_kk', 'lampiran_tiket', 'lampiran_hotel'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function getNameAttribute()
    {
        return 'Pengajuan Visa';
    }

    public function transactionItem()
    {
        return $this->morphOne(TransactionItem::class, 'itemable');
    }
}
