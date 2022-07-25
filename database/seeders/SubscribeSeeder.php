<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscribers = array(
            array('id' => '1','website_id' => '1','email' => 'horizon@gmail.com','created_at' => '2022-07-25 02:46:30','updated_at' => '2022-07-25 02:46:30')
          );


          
          DB::table('subscribers')->insert($subscribers);
        
          
    }
}
