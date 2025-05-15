<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi'; // ← tambahkan ini

    protected $fillable = [
        'user_id',
        'status_absen',
        'waktu_absen',
        'photo_absen',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
