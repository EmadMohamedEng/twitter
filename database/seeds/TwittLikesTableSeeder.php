<?php

use Illuminate\Database\Seeder;

class TwittLikesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('twitt_likes')->delete();
        
        \DB::table('twitt_likes')->insert(array (
            0 => 
            array (
                'id' => 10,
                'user_id' => 5,
                'twitt_id' => 23,
                'created_at' => '2018-12-22 21:52:38',
                'updated_at' => '2018-12-22 21:52:38',
            ),
            1 => 
            array (
                'id' => 17,
                'user_id' => 6,
                'twitt_id' => 24,
                'created_at' => '2018-12-22 21:54:26',
                'updated_at' => '2018-12-22 21:54:26',
            ),
            2 => 
            array (
                'id' => 19,
                'user_id' => 6,
                'twitt_id' => 23,
                'created_at' => '2018-12-22 21:54:47',
                'updated_at' => '2018-12-22 21:54:47',
            ),
        ));
        
        
    }
}