<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_tag')->insert([
            [
                'id' => '1',
                'recipe_id' => '1',
                'tag_id' => '1',
            ], 
            [
                'id' => '2',
                'recipe_id' => '1',
                'tag_id' => '3',
            ], 
            [
                'id' => '3',
                'recipe_id' => '1',
                'tag_id' => '12',
            ], 
            [
                'id' => '4',
                'recipe_id' => '2',
                'tag_id' => '5',
            ], 
            [
                'id' => '5',
                'recipe_id' => '2',
                'tag_id' => '2',
            ], 
            [
                'id' => '6',
                'recipe_id' => '2',
                'tag_id' => '8',
            ], 
            [
                'id' => '7',
                'recipe_id' => '2',
                'tag_id' => '12',
            ], 
            [
                'id' => '8',
                'recipe_id' => '3',
                'tag_id' => '14',
            ], 
            [
                'id' => '9',
                'recipe_id' => '3',
                'tag_id' => '4',
            ], 
            [
                'id' => '10',
                'recipe_id' => '4',
                'tag_id' => '4',
            ], 
            [
                'id' => '11',
                'recipe_id' => '4',
                'tag_id' => '12',
            ], 
            [
                'id' => '12',
                'recipe_id' => '4',
                'tag_id' => '14',
            ], 
            [
                'id' => '13',
                'recipe_id' => '5',
                'tag_id' => '7',
            ], 
            [
                'id' => '14',
                'recipe_id' => '5',
                'tag_id' => '13',
            ], 
           
        ]);
    }
}
