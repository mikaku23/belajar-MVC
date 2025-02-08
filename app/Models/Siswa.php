<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['nama','nisn','jk','alamat','local_id','foto'];
    public function local()
    {
        return $this->belongsTo(local::class);
    }
}
