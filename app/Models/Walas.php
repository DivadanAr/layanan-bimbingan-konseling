<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walas extends Model
{
    protected $table = 'wali_kelas';

    protected $fillable = ['nama', 'nipd', 'kelamin', 'foto', 'tanggal_lahir', 'kelas_id', 'telepon', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function pemanggilan()
    {
        return $this->hasMany(pemanggilan::class);
    }

}
