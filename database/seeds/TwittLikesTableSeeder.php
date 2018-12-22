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
        
        
        
    }
}