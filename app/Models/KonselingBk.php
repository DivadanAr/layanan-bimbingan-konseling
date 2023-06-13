<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonselingBk extends Model
{
    protected $table = 'konseling_bk';

    protected $fillable = [
        'topik',
        'layanan_id',
        'siswa_id',
        'wali_kelas_id',
        'guru_bk_id',
        'tanggal',
        'jam_mulai',
        'jam_berakhir',
        'tempat',
        'hasil_konseling',
        'status'
    ];

    public function guruBK()
    {
        return $this->belongsTo(GuruBK::class, 'guru_bk_id');
    }

    public function waliKelas()
    {
        return $this->belongsTo(Walas::class, 'wali_kelas_id');
    }

    public function layanan()
    {
        return $this->belongsTo(LayananBK::class, 'layanan_id');
    }
    public function siswaKonseling()
{
    return $this->hasMany(siswaKonseling::class, 'konseling_bk_id');
}


}
