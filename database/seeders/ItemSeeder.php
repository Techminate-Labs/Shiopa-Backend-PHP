<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'category_id' => '1',
            'brand_id' => '1',
            'unit_id' => '1',
            'supplier_id' => '1',
            'section_id' => '1',
            'name' => 'Mushroom Pizza',
            'slug' => 'mushroompizza',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '10.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/default.jpg',
            'description' => 'dfsdfs fsf df sdfs ff sdf fewsdf sdfd fdsfd',
            'additional_info' => 'loeme re as sd aerepd ak adkda dalda',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'category_id' => '1',
            'brand_id' => '1',
            'unit_id' => '1',
            'supplier_id' => '1',
            'section_id' => '1',
            'name' => 'Pizza',
            'slug' => 'pizza',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '15.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/default.jpg',
            'description' => 'dfsdfs fsf df sdfs ff sdf fewsdf sdfd fdsfd',
            'additional_info' => 'loeme re as sd aerepd ak adkda dalda',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'category_id' => '1',
            'brand_id' => '1',
            'unit_id' => '1',
            'supplier_id' => '1',
            'section_id' => '2',
            'name' => 'Pizza',
            'slug' => 'pizza',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '15.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/default.jpg',
            'description' => 'dfsdfs fsf df sdfs ff sdf fewsdf sdfd fdsfd',
            'additional_info' => 'loeme re as sd aerepd ak adkda dalda',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
