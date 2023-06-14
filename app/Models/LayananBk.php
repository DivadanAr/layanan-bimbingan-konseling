<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananBk extends Model
{
    protected $table = 'layanan_bk';

    protected $fillable = [
        'jenis_layanan',
    ];
}
