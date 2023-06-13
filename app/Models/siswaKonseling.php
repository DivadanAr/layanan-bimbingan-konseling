<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswaKonseling extends Model
{
    protected $table = 'siswa_konseling';

    protected $fillable = [
        'siswa_id',
        'konseling_bk_id',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function konselingBk()
    {
        return $this->belongsTo(konselingBk::class, 'konseling_bk_id');
    }
}
