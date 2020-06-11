<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@ss.com',
            'password' => bcrypt('123123'),
            'education' => 'none',
            'teaching_verified' => true
        ]);

        DB::table('teachers')->insert([
            'user_id' => 1,
            'highest_education' => 'none',
            'departments' => 'abcd',
            'teaching_experience' => 'none',
            'path' => 'aaaaa.bbbbb'
        ]);
    }
}
