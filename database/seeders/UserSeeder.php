<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        // $gurubk = User::create([
        //     'name' => 'Ricky Sudrajat',
        //     'email' => 'ricky@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ]);

        // $gurubk->assignRole('guru_bk');

        // $walas = User::create([
        //     'name' => 'Nahla Naufan',
        //     'email' => 'nahla@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ]);

        // $walas->assignRole('wali_kelas');

        // $siswaAcount = User::create([
        //     'name' => 'Divadan Arya',
        //     'email' => 'divadan@gmail.com',
        //     'password' => bcrypt('12345678'),
        // ]);

        // $siswaAcount->assignRole('siswa');

        // $siswa = Siswa::create([
        //     'user_id' => $siswaAcount->id,
        //     'nama' => 'Divadan Arya',
        //     'nisn' => '55612314',
        //     'tanggal_lahir' => '2005-12-16',
        //     'kelamin' => 'Laki-laki',
        //     'telepon' => '081297283285',
        //     'kelas_id' => 8
        // ]);
    }
}
