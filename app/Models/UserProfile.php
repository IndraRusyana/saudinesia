<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pekerjaan',
        'no_hp',
        'photo', 
        'no_paspor', 
        'paspor_terbit', 
        'paspor_kadaluarsa', 
        'wilayah_terbit',
        'lampiran_paspor'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
