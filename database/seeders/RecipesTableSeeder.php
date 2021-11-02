<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            [
                'id' => '1',
                'name' => 'Pizza',
                'category' => 'Main course',
                'description' => 'Italian home made pizza with mozzarella cheese.',

            ],[
                'id' => '2',
                'name' => 'Beef & Chicken Shawarma',
                'category' => 'Main course',
                'description' => 'Traditional turkish shawarma, made with chicken and beef meat.',

            ],[
                'id' => '3',
                'name' => 'Vegetable Soup',
                'category' => 'Starter',
                'description' => 'Healthy vegetable soup to start your dinners with.',

            ],[
                'id' => '4',
                'name' => 'Caesar Salad',
                'category' => 'Starter',
                'description' => 'Classic Caesar Salad with crisp homemade croutons and a light caesar salad dressing.',

            ],[
                'id' => '5',
                'name' => 'Fruit Salad',
                'category' => 'Dessert',
                'description' => 'A healthy dessert that you can enjoy without holding back, made from seasonal fruits.',

            ],   
           
        ]);
    }
}
