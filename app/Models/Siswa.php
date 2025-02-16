<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nisn', 'jk', 'alamat', 'nohp', 'local_id', 'foto'];

    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }
}

