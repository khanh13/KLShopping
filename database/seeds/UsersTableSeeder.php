<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'   => 'khanh123',
            'phone'      => '123456789',
            'email'     => 'khanh123@gmail.com',
            'password'  => bcrypt('khanh123'),
        ]);
        DB::table('users')->insert([
            'name'   => 'khanh12345',
            'phone'      => '123456789',
            'email'     => 'khanh12345@gmail.com',
            'password'  => bcrypt('khanh12345'),
        ]);
    }
}
