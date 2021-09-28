<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'parent_id' => '0',
            'name' => 'Pizza',
            'slug' => 'pizza',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '1',
            'name' => 'Burger',
            'slug' => 'burger',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '1',
            'name' => 'Sandwitch',
            'slug' => 'sandwitch',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '2',
            'name' => 'Fried Chicken',
            'slug' => 'friedchicken',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '2',
            'name' => 'Fired Rice',
            'slug' => 'friedrice',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '3',
            'name' => 'Biriani',
            'slug' => 'biriani',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
