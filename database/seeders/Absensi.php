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
        for($i = 0; $i < 5; $i++){
            Presensi::create([
                'id_karyawan'         => $faker->numberBetween(1, 5),
                'masuk'          => $faker->dateTimeInInterval('-3 hours','+1 hours'),
                'keluar'          => $faker->dateTimeInInterval('+7 hours','-1 hours'),
                'status'        => 1
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}