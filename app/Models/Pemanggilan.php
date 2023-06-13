<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemanggilan extends Model
{
    use HasFactory;
    protected $table = 'pemanggilans';

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function guruBK()
    {
        return $this->belongsTo(GuruBK::class);
    }

    public function wali_kelas()
    {
        return $this->belongsTo(Walas::class);
    }

    protected $fillable = [
        'siswa_id',
        'guru_bk_id',
        'wali_kelas_id',
        'hari',
        'tanggal',
        'jam',
        'tempat',
        'acara'
    ];
}


 
