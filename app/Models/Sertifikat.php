<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = 'sertifikat';
    protected $fillable = [
        'id_sertifikat ', 'nama_sertifikat', 'status_pengajuan','created_by', 'created_at', 'updated_at' , 'updated_by'
    ];
}
