<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home_images')->insert([
            'title' => 'Gray Classic Sofa',
            'description' => 'Description of slider image',
            'section' => 'slider',
            'image' => 'http://127.0.0.1:8000/images/home/sofa_1000w.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'Wooden Clock',
            'description' => 'Description of slider image',
            'section' => 'slider',
            'image' => 'http://127.0.0.1:8000/images/home/clock_1000w.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'Jewelry',
            'description' => 'Description of slider image',
            'section' => 'slider',
            'image' => 'http://127.0.0.1:8000/images/home/beads_1000w.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'banner-1',
            'description' => 'Description of slider image',
            'section' => 'banner_top',
            'image' => 'http://127.0.0.1:8000/images/home/banner-1.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'banner-2',
            'description' => 'Description of slider image',
            'section' => 'banner_top',
            'image' => 'http://127.0.0.1:8000/images/home/banner-2.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'banner-3',
            'description' => 'Description of slider image',
            'section' => 'banner_top',
            'image' => 'http://127.0.0.1:8000/images/home/banner-3.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'banner-1',
            'description' => 'Description of slider image',
            'section' => 'banner_middle',
            'image' => 'http://127.0.0.1:8000/images/home/banner-1.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'banner-2',
            'description' => 'Description of slider image',
            'section' => 'banner_bottom',
            'image' => 'http://127.0.0.1:8000/images/home/banner-2.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'banner-3',
            'description' => 'Description of slider image',
            'section' => 'brand_logo',
            'image' => 'http://127.0.0.1:8000/images/home/banner-3.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'banner-1',
            'description' => 'Description of slider image',
            'section' => 'brand_logo',
            'image' => 'http://127.0.0.1:8000/images/home/banner-1.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'banner-2',
            'description' => 'Description of slider image',
            'section' => 'brand_logo',
            'image' => 'http://127.0.0.1:8000/images/home/banner-2.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('home_images')->insert([
            'title' => 'banner-3',
            'description' => 'Description of slider image',
            'section' => 'brand_logo',
            'image' => 'http://127.0.0.1:8000/images/home/banner-3.png',
            'is_active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
