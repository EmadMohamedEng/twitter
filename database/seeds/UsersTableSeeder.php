<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'ahmed ali',
                'email' => 'ahmed333555777@gmail.com',
                'password' => '$2y$10$n3aI5rSMCXzDWu3pPg6xKeoBIAQOFlE3psO.FAPvzRce.Yi9bjYn6',
                'remember_token' => 'hHOEFARZcOb5kxXy9QYJIAGwbzUQ5OKuR1BaS7l8AS7gSC8nDuSa5OsXRmCF',
                'created_at' => '2018-12-22 17:55:38',
                'updated_at' => '2018-12-22 17:55:38',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Emad Mohamed',
                'email' => 'eng.emadmohamedphp@gmail.com',
                'password' => '$2y$10$4G2oE7MTUpRyWorWf/mlWuUuKzMMyvBv6cFqJqGR4yUj0yWYX2J6y',
                'remember_token' => NULL,
                'created_at' => '2018-12-22 21:28:27',
                'updated_at' => '2018-12-22 21:28:27',
            ),
        ));
        
        
    }
}