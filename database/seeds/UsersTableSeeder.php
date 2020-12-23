<?php

use Illuminate\Database\Seeder;

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
            'name' => 'alsharif',
            'email' => 'lion.mac@live.com',
            'password' => bcrypt('1212') ,
        ]);

        DB::table('users')->insert([
            'name' => 'Hatan',
            'email' => 'hatan@live.com',
            'password' => bcrypt('1212') ,
        ]);

        DB::table('users')->insert([
            'name' => 'numi',
            'email' => 'numi@live.com',
            'password' => bcrypt('1212') ,
        ]);
    }
}
