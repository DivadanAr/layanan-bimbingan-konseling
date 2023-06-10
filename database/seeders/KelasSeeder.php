<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'nama' => 'XI TJKTI 1',
        ]);
        Kelas::create([
            'nama' => 'XI TJKTI 2',
        ]);
        Kelas::create([
            'nama' => 'XI ANIMASI 1',
        ]);
        Kelas::create([
            'nama' => 'XI ANIMASI 2',
        ]);
        Kelas::create([
            'nama' => 'XI ANIMASI 3',
        ]);
        Kelas::create([
            'nama' => 'XI ANIMASI 4',
        ]);
        Kelas::create([
            'nama' => 'XI PPLG 1',
        ]);
        Kelas::create([
            'nama' => 'XI PPLG 2',
        ]);
        Kelas::create([
            'nama' => 'XI BRC',
        ]);
        Kelas::create([
            'nama' => 'XI TE',
        ]);
    }
}
