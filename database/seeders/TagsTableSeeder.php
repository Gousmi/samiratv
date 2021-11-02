<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'id' => '1',
                'name' => 'italian',
            ],[
                'id' => '2',
                'name' => 'traditional',
            ],[
                'id' => '3',
                'name' => 'fastFood',
            ],[
                'id' => '4',
                'name' => 'healthy',
            ],[
                'id' => '5',
                'name' => 'turkish',
            ],[
                'id' => '6',
                'name' => 'algerian',
            ],[
                'id' => '7',
                'name' => 'sweet',
            ],[
                'id' => '8',
                'name' => 'meat',
            ],[
                'id' => '9',
                'name' => 'grill',
            ],[
                'id' => '10',
                'name' => 'pastry',
            ],[
                'id' => '11',
                'name' => 'breakfast',
            ],[
                'id' => '12',
                'name' => 'lunch',
            ],[
                'id' => '13',
                'name' => 'snack',
            ],[
                'id' => '14',
                'name' => 'greens',
            ],
           
        ]);
    }
}
