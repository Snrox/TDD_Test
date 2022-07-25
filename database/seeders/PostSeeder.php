<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     

    public function run()
    {
        $posts = array(
            
            array('id' => '1','website_id' => '1','title' => 'Boost the humidity','img' => 'https://bloomscape.com/wp-content/uploads/2018/11/humidity-pebble-tray-1024x682.jpg?ver=8786','description' => 'For most houseplants, average household humidity is just fine. However, a boost in humidity while away is a great trick to extend the time needed between waterings. Plants in a more humid environment will transpire more slowly, meaning they’ll utilize water from the soil more slowly.
          
          For an easy way to increase humidity, group your plants together. The water vapor released by the plants will be trapped within their canopies, creating a more humid microclimate. You can also place a dish of water in the center of your plant grouping—as the water evaporates, it will add to the humid effect.','isDeleted' => '0','created_at' => '2022-07-24 23:13:26','updated_at' => '2022-07-24 23:13:26'),
            
          );
          

          DB::table('posts')->insert($posts);

        
    }
}
