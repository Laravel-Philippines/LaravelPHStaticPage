<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'goryo.webdev@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        */
        DB::table('users')->insert([
            'name' => 'member',
            'email' => 'gkmgarcia@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
