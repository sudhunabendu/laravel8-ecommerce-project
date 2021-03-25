<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Product_Seeder extends Seeder
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

                'name'=>'t-shirt',
                'price'=>'600',
                'description'=>'formal shirt',
                'category'=>'garments',
                'gallery'=>'https://www.vaidikutpaad.in/wp-content/uploads/2020/07/1.jpeg'
    
            ],
            [

                'name'=>'t-shirt',
                'price'=>'550',
                'description'=>'formal shirt',
                'category'=>'garments',
                'gallery'=>'https://www.vaidikutpaad.in/wp-content/uploads/2020/07/1.jpeg'
    
            ],
            [

                'name'=>'t-shirt',
                'price'=>'350',
                'description'=>'formal shirt',
                'category'=>'garments',
                'gallery'=>'https://www.vaidikutpaad.in/wp-content/uploads/2020/07/1.jpeg'
    
            ],
            [

                'name'=>'t-shirt',
                'price'=>'450',
                'description'=>'formal shirt',
                'category'=>'garments',
                'gallery'=>'https://www.vaidikutpaad.in/wp-content/uploads/2020/07/1.jpeg'
    
            ],
            [

                'name'=>'t-shirt',
                'price'=>'500',
                'description'=>'formal shirt',
                'category'=>'garments',
                'gallery'=>'https://www.vaidikutpaad.in/wp-content/uploads/2020/07/1.jpeg'
    
            ]
        ]);
        
    }
}
