<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'user_id' => '1',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'mobile' => '01911908431',
            'street_address' => 'Uttara, dhaka, Bangladesh, 1230',
            'city' => '1230',
            'state' => 'Dhaka',
            'country' => 'Dhaka',
            'zip' => 'Dhaka',
            'image' => 'http://127.0.0.1:8000/images/profile/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('profiles')->insert([
            'user_id' => '2',
            'first_name' => 'Sazid',
            'last_name' => 'Ahmed',
            'mobile' => '01911908431',
            'street_address' => 'Uttara, dhaka, Bangladesh, 1230',
            'city' => '1230',
            'state' => 'Dhaka',
            'country' => 'Dhaka',
            'zip' => 'Dhaka',
            'image' => 'http://127.0.0.1:8000/images/profile/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('profiles')->insert([
            'user_id' => '3',
            'first_name' => 'Customer',
            'last_name' => 'One',
            'mobile' => '01995988000',
            'street_address' => 'Uttara, dhaka, Bangladesh, 1230',
            'city' => '1230',
            'state' => 'Dhaka',
            'country' => 'Dhaka',
            'zip' => 'Dhaka',
            'image' => 'http://127.0.0.1:8000/images/profile/default.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
