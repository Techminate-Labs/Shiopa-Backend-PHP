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
            'name' => 'Product 1',
            'slug' => 'product-1',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '10.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/product-1.png',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'additional_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'category_id' => '1',
            'brand_id' => '1',
            'unit_id' => '1',
            'supplier_id' => '1',
            'section_id' => '1',
            'name' => 'Product 1',
            'slug' => 'product-1',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '10.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/product-2.png',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'additional_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'category_id' => '2',
            'brand_id' => '2',
            'unit_id' => '2',
            'supplier_id' => '2',
            'section_id' => '1',
            'name' => 'Product 1',
            'slug' => 'product-1',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '10.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/product-3.png',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'additional_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'category_id' => '2',
            'brand_id' => '2',
            'unit_id' => '2',
            'supplier_id' => '2',
            'section_id' => '1',
            'name' => 'Product 1',
            'slug' => 'product-1',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '10.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/product-4.png',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'additional_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'category_id' => '3',
            'brand_id' => '3',
            'unit_id' => '3',
            'supplier_id' => '3',
            'section_id' => '1',
            'name' => 'Product 1',
            'slug' => 'product-1',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '10.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/product-5.png',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'additional_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'category_id' => '4',
            'brand_id' => '4',
            'unit_id' => '4',
            'supplier_id' => '4',
            'section_id' => '1',
            'name' => 'Product 1',
            'slug' => 'product-1',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '10.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/product-6.png',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'additional_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'category_id' => '4',
            'brand_id' => '4',
            'unit_id' => '4',
            'supplier_id' => '4',
            'section_id' => '1',
            'name' => 'Product 1',
            'slug' => 'product-1',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '10.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/product-7.png',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'additional_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'category_id' => '5',
            'brand_id' => '5',
            'unit_id' => '5',
            'supplier_id' => '5',
            'section_id' => '1',
            'name' => 'Product 1',
            'slug' => 'product-1',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '10.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/product-8.png',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'additional_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('items')->insert([
            'category_id' => '5',
            'brand_id' => '5',
            'unit_id' => '5',
            'supplier_id' => '5',
            'section_id' => '1',
            'name' => 'Product 1',
            'slug' => 'product-1',
            'sku' => '0001',
            'cost' => '8.20',
            'price' => '10.20',
            'discount' => '2.20',
            'inventory' => '10',
            'available' => '1',
            'expire_date' => '2021-09-22 15:06:48',
            'image' => 'http://127.0.0.1:8000/images/item/product-9.png',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'additional_info' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, quibusdam?',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
