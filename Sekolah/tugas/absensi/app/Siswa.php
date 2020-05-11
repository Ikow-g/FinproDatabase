<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $primaryKey = 'id_siswa';

    protected $table = 'siswa';

        protected $fillable = ['nama','no_hp','id_kelas'];


    public function kelas()
    {
        return $this->hasOne(Kelas::class,'id_kelas','id_kelas');
    }

    public function absen()
    {
        return $this->hasMany(Absen::class,'id_siswa','id_siswa');
    }
}
