<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        //buat user admin
        User::truncate();
        
        User::create([
            'id_karyawan'  => '1',
            'user'     => 'hrd@hrd.com',
            'password'     => bcrypt('hrd'),
            'level'        => 'keuangan',
            'active'       => '1',
        ]);

        User::create([
            'id_karyawan'  => '2',
            'user'     => 'keuangan@keuangan.com',
            'password'     => bcrypt('keuangan'),
            'level'        => 'keuangan',
            'active'       => '1',
        ]);

        User::create([
            'id_karyawan'  => '3',
            'user'     => 'manager@manager.com',
            'password'     => bcrypt('manager'),
            'level'        => 'manager',
            'active'       => '1',
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
