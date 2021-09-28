<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            'name' => 'Popular',
            'index' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sections')->insert([
            'name' => 'Discount Offer',
            'index' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sections')->insert([
            'name' => 'Most Selling',
            'index' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
