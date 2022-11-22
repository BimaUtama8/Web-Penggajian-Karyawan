<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presensi;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class Absensi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        //buat divisi
        // Presensi::truncate();
        $faker = Faker::create('id_ID');
        for($i = 0; $i <= 50; $i++){
            Presensi::create([
                'id_karyawan'         => $faker->unique()->numberBetween(1, 50),
                'masuk'               => $faker->dateTimeInInterval('-6 hours','+1 hours'),
                'keluar'              => $faker->dateTimeInInterval('+4 hours','-1 hours'),
                'status'              => $faker->numberBetween(1, 3),
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}