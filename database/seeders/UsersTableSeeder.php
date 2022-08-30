<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::create([
            'email' => 'admink@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'keuangan',
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
