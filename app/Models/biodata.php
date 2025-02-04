<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class biodata extends Model
{
    public function data_siswa(){

        $data=array(
        array("nama" => "Haliq", "kelas" => "XI RPL 1"),
        array("nama" => "Rejomok", "kelas" => "X RPL 1"),
        array("nama" => "Ajay", "kelas" => "XII RPL 1"),
        array("nama" => "Dikadal", "kelas" => "XII MP")
        );
        return $data;
    }
}
