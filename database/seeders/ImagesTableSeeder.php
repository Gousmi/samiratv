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
                'name'=> 'seed-pizza.jpg',
                'path' => '/images/seeds/seed-pizza.jpg',
                'recipe_id' => '1',
                'is_thumb' => '0'
            ],
            [
                'id' => '2',
                'name'=> 'seed-pizza.jpg',
                'path' => '/images/seeds/thumbnails/seed-pizza.jpg',
                'recipe_id' => '1',
                'is_thumb' => '1'
            ],
            [
                'id' => '3',
                'name'=> 'seed-shawarma.jpg',
                'path' => '/images/seeds/seed-shawarma.jpg',
                'recipe_id' => '2',
                'is_thumb' => '0'
            ],
            [
                'id' => '4',
                'name'=> 'seed-shawarma.jpg',
                'path' => '/images/seeds/thumbnails/seed-shawarma.jpg',
                'recipe_id' => '2',
                'is_thumb' => '1'
            ],
            [
                'id' => '5',
                'name'=> 'seed-soup.jpg',
                'path' => '/images/seeds/seed-soup.jpg',
                'recipe_id' => '3',
                'is_thumb' => '0'
            ],
            [
                'id' => '6',
                'name'=> 'seed-soup.jpg',
                'path' => '/images/seeds/thumbnails/seed-soup.jpg',
                'recipe_id' => '3',
                'is_thumb' => '1'
            ],
            [
                'id' => '7',
                'name'=> 'seed-czsalad.jpg',
                'path' => '/images/seeds/seed-czsalad.jpg',
                'recipe_id' => '4',
                'is_thumb' => '0'
            ],
            [
                'id' => '8',
                'name'=> 'seed-czsalad.jpg',
                'path' => '/images/seeds/thumbnails/seed-czsalad.jpg',
                'recipe_id' => '4',
                'is_thumb' => '1'
            ],
            [
                'id' => '9',
                'name'=> 'seed-fruitsalad.jpg',
                'path' => '/images/seeds/seed-fruitsalad.jpg',
                'recipe_id' => '5',
                'is_thumb' => '0'
            ],
            [
                'id' => '10',
                'name'=> 'seed-fruitsalad.jpg',
                'path' => '/images/seeds/thumbnails/seed-fruitsalad.jpg',
                'recipe_id' => '5',
                'is_thumb' => '1'
            ],

        ]);
    }
}
