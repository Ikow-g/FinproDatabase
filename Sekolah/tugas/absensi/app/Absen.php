<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';

    protected $primaryKey = 'id_absen';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
}
