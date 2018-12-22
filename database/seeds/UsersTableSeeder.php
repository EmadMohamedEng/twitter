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
                'name' => 'emad mohamed',
                'email' => 'ahmed333555777@gmail.com',
                'password' => '$2y$10$n3aI5rSMCXzDWu3pPg6xKeoBIAQOFlE3psO.FAPvzRce.Yi9bjYn6',
                'remember_token' => 'yTSP78eFaAENH5lOvCz3WZK19822fjFxGelRiesQkorCkjgEnEoSonroxOBz',
                'created_at' => '2018-12-22 17:55:38',
                'updated_at' => '2018-12-22 17:55:38',
            ),
        ));
        
        
    }
}