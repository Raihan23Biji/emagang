<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logbook extends Model
{
    /** @use HasFactory<\Database\Factories\LogbookFactory> */
    use HasFactory;
     protected $fillable = ['user_id', 'kegiatan'];
     // app/Models/Logbook.php

public function user()
{
    return $this->belongsTo(User::class);
}


     
}
