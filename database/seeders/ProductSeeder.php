<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([

            [
                'name'=>'LG oled tv',
                'price'=>'1400',
                'category'=>'tv',
                'description'=>'Oled tv',
                'gallery'=>'https://www.lg.com/us/images/tvs/md07501098/gallery/medium01.jpg'

            ],
            [
                'name'=>'LG projector',
                'price'=>'700',
                'category'=>'video',
                'description'=>'Full HD projector',
                'gallery'=>'https://www.lg.com/us/images/home-video/md05928417/gallery/medium05.jpg'

            ],
            [
                'name'=>'LG headphones',
                'price'=>'100',
                'category'=>'audio',
                'description'=>'A bluetooth headphones',
                'gallery'=>'https://www.lg.com/us/images/bluetooth-headsets-headphones/md07511361/gallery/desktop-01-v1.jpg'

            ],
            [
                'name'=>'LG cooktop',
                'price'=>'1000',
                'category'=>'appliances',
                'description'=>'Electric cooktop',
                'gallery'=>'https://www.lg.com/us/images/cooking-appliances/md00000077/gallery/LCE3010SB_20180205_D01.jpg'

            ],
            [
                'name'=>'LG refrigerator',
                'price'=>'4000',
                'category'=>'refrigerators',
                'description'=>'Counter depth refrigerator',
                'gallery'=>'https://www.lg.com/us/images/refrigerators/md07501104/gallery/medium01.jpg'

            ],
            [
                'name'=>'LG laptop',
                'price'=>'1800',
                'category'=>'computers',
                'description'=>'Ultra-Lightweight laptop',
                'gallery'=>'https://www.lg.com/us/images/laptops/md07500001/gallery/desktop-01.jpg'

            ],


        ]);
    }
}
