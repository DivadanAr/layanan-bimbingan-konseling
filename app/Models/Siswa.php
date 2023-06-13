<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = ['nama', 'nisn', 'kelamin', 'tanggal_lahir', 'kelas_id', 'telepon', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function siswaKonseling()
    {
        return $this->hasMany(siswaKonseling::class, 'siswa_id');
    }
    public function konselingBk()
    {
        return $this->hasMany(KonselingBk::class);
    }

    public function pemanggilan()
    {
        return $this->hasMany(pemanggilan::class);
    }


}
