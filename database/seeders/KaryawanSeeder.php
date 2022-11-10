<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        Schema::disableForeignKeyConstraints();
        Karyawan::truncate();
        Karyawan::create([
            'id_jabatan'        => 9002,
            'id_user'           => 1,
            'nama'              => $faker->name,
            'tanggal_masuk'     => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'Asia/Jakarta'),
            'alamat'            => $faker->address,
            'tempat_lahir'      => $faker->city,
            'tanggal_lahir'     => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years', $timezone = 'Asia/Jakarta'),
            'agama'             => $faker->randomElement(['Islam', 'Kristen', 'Hindhu', 'Konghucu', 'Buddha', 'Katolik']),
            'gaji'              => 7000000,
            'kelamin'           => $faker->randomElement(['Laki-Laki', 'Perempuan']),
            'telepon'           => $faker->phoneNumber,
            'tanggungan'        => $faker->numberBetween(0, 3),
            'status'            => $faker->randomElement(['Menikah', 'Tidak Menikah']),
            'npwp'              => 1,
        ]);

        for($k = 2; $k <= 6; $k++){
            Karyawan::create([
                'id_jabatan'        => 9003,
                'id_user'           => $k,
                'nama'              => $faker->name,
                'tanggal_masuk'     => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'Asia/Jakarta'),
                'alamat'            => $faker->address,
                'tempat_lahir'      => $faker->city,
                'tanggal_lahir'     => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years', $timezone = 'Asia/Jakarta'),
                'agama'             => $faker->randomElement(['Islam', 'Kristen', 'Hindhu', 'Konghucu', 'Buddha', 'Katolik']),
                'gaji'              => 6000000,
                'kelamin'           => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'telepon'           => $faker->phoneNumber,
                'tanggungan'        => $faker->numberBetween(0, 3),
                'status'            => $faker->randomElement(['Menikah', 'Tidak Menikah']),
                'npwp'              => $faker->numberBetween(0, 1),
            ]);
        }
        for($i = 7; $i <= 12; $i++){
            Karyawan::create([
                'id_jabatan'        => 9004,
                'id_user'           => $i,
                'nama'              => $faker->name,
                'tanggal_masuk'     => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'Asia/Jakarta'),
                'alamat'            => $faker->address,
                'tempat_lahir'      => $faker->city,
                'tanggal_lahir'     => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years', $timezone = 'Asia/Jakarta'),
                'agama'             => $faker->randomElement(['Islam', 'Kristen', 'Hindhu', 'Konghucu', 'Buddha', 'Katolik']),
                'gaji'              => 5500000,
                'kelamin'           => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'telepon'           => $faker->phoneNumber,
                'tanggungan'        => $faker->numberBetween(0, 3),
                'status'            => $faker->randomElement(['Menikah', 'Tidak Menikah']),
                'npwp'              => $faker->numberBetween(0, 1)
            ]);
        }
        for($karyawan = 13; $karyawan <= 41; $karyawan++){
            Karyawan::create([
                'id_jabatan'        => 9005,
                'id_user'           => $karyawan,
                'nama'              => $faker->name,
                'tanggal_masuk'     => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'Asia/Jakarta'),
                'alamat'            => $faker->address,
                'tempat_lahir'      => $faker->city,
                'tanggal_lahir'     => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years', $timezone = 'Asia/Jakarta'),
                'agama'             => $faker->randomElement(['Islam', 'Kristen', 'Hindhu', 'Konghucu', 'Buddha', 'Katolik']),
                'gaji'              => 4700000,
                'kelamin'           => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'telepon'           => $faker->phoneNumber,
                'tanggungan'        => $faker->numberBetween(0, 3),
                'status'            => $faker->randomElement(['Menikah', 'Tidak Menikah']),
                'npwp'              => $faker->numberBetween(0, 1)
            ]);
        }
        
        Schema::enableForeignKeyConstraints();
    }
}
