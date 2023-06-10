<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetaKerawanan extends Model
{
    protected $table = 'peta_kerawanan';

    protected $fillable = [
        'jenis_kerawanan_id',
        'siswa_id',
        'wali_kelas_id',
        'kelas_id'
    ];

    public function jenis_kerawanan()
    {
        return $this->belongsTo(Kerawanan::class);
    }

    public function wali_kelas()
    {
        return $this->belongsTo(Walas::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

}
