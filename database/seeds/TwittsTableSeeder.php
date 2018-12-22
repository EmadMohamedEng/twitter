<?php

use Illuminate\Database\Seeder;

class TwittsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('twitts')->delete();
        
        \DB::table('twitts')->insert(array (
            0 => 
            array (
                'id' => 23,
                'twitt' => 'twitt1 by user 1',
                'user_id' => 5,
                'created_at' => '2018-12-22 21:51:39',
                'updated_at' => '2018-12-22 21:51:39',
            ),
            1 => 
            array (
                'id' => 24,
                'twitt' => 'twit2 by user 2',
                'user_id' => 6,
                'created_at' => '2018-12-22 21:52:05',
                'updated_at' => '2018-12-22 21:52:05',
            ),
            2 => 
            array (
                'id' => 25,
                'twitt' => 'twit3 by user 1',
                'user_id' => 5,
                'created_at' => '2018-12-22 21:52:16',
                'updated_at' => '2018-12-22 21:52:16',
            ),
            3 => 
            array (
                'id' => 26,
                'twitt' => 'twit4 by user2',
                'user_id' => 6,
                'created_at' => '2018-12-22 21:53:04',
                'updated_at' => '2018-12-22 21:53:04',
            ),
            4 => 
            array (
                'id' => 27,
                'twitt' => 'twit4 by user 1',
                'user_id' => 6,
                'created_at' => '2018-12-22 21:53:45',
                'updated_at' => '2018-12-22 21:53:45',
            ),
            5 => 
            array (
                'id' => 28,
                'twitt' => 'twit5 by user 1',
                'user_id' => 6,
                'created_at' => '2018-12-22 21:54:02',
                'updated_at' => '2018-12-22 21:54:02',
            ),
        ));
        
        
    }
}