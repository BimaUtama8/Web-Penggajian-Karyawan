<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

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

        $faker = Faker::create('id_ID');
        //buat user admin
        User::truncate();
        
        User::create([
            'id_karyawan'  => '7',
            'email'     => 'hrd@hrd.com',
            'password'     => bcrypt('hrd'),
            'level'        => 'hrd',
            'active'       => '1',
        ]);

        User::create([
            'id_karyawan'  => '2',
            'email'     => 'keuangan@keuangan.com',
            'password'     => bcrypt('keuangan'),
            'level'        => 'keuangan',
            'active'       => '1',
        ]);

        User::create([
            'id_karyawan'  => '1',
            'email'     => 'manager@manager.com',
            'password'     => bcrypt('manager'),
            'level'        => 'manager',
            'active'       => '1',
        ]);
        

        for($admin = 3; $admin <= 6; $admin++){
            // for($i = 4; $i <= 50; $i++){
                User::create([
                    'id_karyawan'  => $admin,
                    'email'        => $faker->email,
                    'password'     => bcrypt(123456),
                    'level'        => 'keuangan',
                    'active'       => '1',
                ]);
            // }
        }

        for($admin = 8; $admin <= 12; $admin++){
            // for($i = 4; $i <= 50; $i++){
                User::create([
                    'id_karyawan'  => $admin,
                    'email'        => $faker->email,
                    'password'     => bcrypt(123456),
                    'level'        => 'hrd',
                    'active'       => '1',
                ]);
            // }
        }

        for($admin = 13; $admin <= 41; $admin++){
            // for($i = 4; $i <= 50; $i++){
                User::create([
                    'id_karyawan'  => $admin,
                    'email'        => $faker->email,
                    'password'     => bcrypt(123456),
                    'level'        => 'karyawan',
                    'active'       => '1',
                ]);
            // }
        }

        Schema::enableForeignKeyConstraints();
    }
}
