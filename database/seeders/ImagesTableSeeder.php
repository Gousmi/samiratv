<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {      
        DB::table('images')->insert([
            [
                'id' => '1',
                'path' => '/images/seeds/seed-pizza.jpg',
                'recipe_id' => '1',
            ],
            [
                'id' => '2',
                'path' => '/images/seeds/seed-shawarma.jpg',
                'recipe_id' => '2',
            ],
            [
                'id' => '3',
                'path' => '/images/seeds/seed-soup.jpg',
                'recipe_id' => '3',
            ],
            [
                'id' => '4',
                'path' => '/images/seeds/seed-czsalad.jpg',
                'recipe_id' => '4',
            ],
            [
                'id' => '5',
                'path' => '/images/seeds/seed-fruitsalad.jpg',
                'recipe_id' => '5',
            ],

        ]);
    }
}
