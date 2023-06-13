<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\SmartPunct\Quote;

class GuruBk extends Model
{
    protected $table = 'guru_bk';

    protected $fillable = ['nama', 'nipd', 'kelamin', 'foto', 'tanggal_lahir', 'kelas_id', 'telepon', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function kelas()
    {
        return $this->hasOne(Kelas::class);
    }
    public function quotes()
    {
        return $this->hasMany(quotes::class);
    }
    public function pemanggilan()
    {
        return $this->hasMany(pemanggilan::class);
    }


}
