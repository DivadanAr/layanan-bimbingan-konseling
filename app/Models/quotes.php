<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quotes extends Model
{
    protected $table = 'quotes';

    protected $fillable = [
        'guru_bk_id',
        'quotes'
    ];

    public function guru_bk()
    {
        return $this->belongsTo(GuruBk::class);
    }
}


