<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'   => 'Admin123',
            'phone'      => '123456789',
            'email'     => 'admin12345@gmail.com',
            'password'  => bcrypt('admin12345'),
        ]);
    }
}
