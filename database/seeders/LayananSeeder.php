<?php

namespace Database\Seeders;

use App\Models\LayananBk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LayananBk::create([
            'jenis_layanan' => 'bimbingan pribadi',
        ]);
        LayananBk::create([
            'jenis_layanan' => 'bimbingan sosial',
        ]);
        LayananBk::create([
            'jenis_layanan' => 'bimbingan karir',
        ]);
        LayananBk::create([
            'jenis_layanan' => 'bimbingan belajar',
        ]);
        
    }
}
