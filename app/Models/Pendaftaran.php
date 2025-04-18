<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $fillable = [
        'id_pendaftaran', 'gambar', 'ktp', 'prodi','jurusan', 'surat_rekomendasi','cv','proposal','id_users','universitas','dari_tanggal', 'dari_tanggal', 'sampai_tanggal','keterangan','created_at', 'updated_at'
    ];
}
