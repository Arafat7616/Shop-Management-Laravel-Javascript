<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'type'     => '1',
            'password'  => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name'      => 'Staff',
            'email'     => 'staff@gmail.com',
            'password'  => Hash::make('password'),
            'status'     => '0',
        ]);
    }
}
