<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = ['nama'];

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }

    public function guru_bk()
    {
        return $this->belongsTo(GuruBk::class);
    }

    public function wali_kelas()
    {
        return $this->belongsTo(walas::class, 'wali_kelas_id');
    }

}
