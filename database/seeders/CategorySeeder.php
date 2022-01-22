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
            'name' => 'Instrument',
            'slug' => 'instrument',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '0',
            'name' => 'Device',
            'slug' => 'device',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '1',
            'name' => 'guitar',
            'slug' => 'guitar',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '1',
            'name' => 'Bass',
            'slug' => 'bass',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '1',
            'name' => 'Piano',
            'slug' => 'piano',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '2',
            'name' => 'Mobile',
            'slug' => 'mobile',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'parent_id' => '2',
            'name' => 'Laptop',
            'slug' => 'laptop',
            'image' => 'http://127.0.0.1:8000/images/category/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
