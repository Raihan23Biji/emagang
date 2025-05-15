<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiMagang extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai konvensi Laravel (opsional jika nama tabel sudah sesuai)
    protected $table = 'nilai_magang';

    // Kolom yang boleh diisi
    protected $fillable = [
        'user_id',
        'kepribadian',
        'penguasaan_materi',
        'kedisiplinan',
        'kreativitas',
        'kerja_sama_tim',
        'tanggung_jawab',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
