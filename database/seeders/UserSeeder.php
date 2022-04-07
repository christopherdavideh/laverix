<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        DB::table('users')->insert([
            'names' => 'Admin',
            'lastnames' => 'Laverix',
            'phone' => '099999999',
            'address' => 'Ecuador',
            'birth' => '1996-02-15',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin.2022'),
            'admin' => 1,
            'last_conexion' => date('Y-m-d H:i:s'),
        ]);
    }
}
