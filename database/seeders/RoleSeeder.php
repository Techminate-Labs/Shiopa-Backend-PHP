<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'admin',
            'permissions'=> '[{"Users":{"create":false,"view":false,"edit":false,"delete":false,"list":false}},{"Roles":{"create":true,"view":false,"edit":true,"delete":true,"list":false}}]',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name'=>'manager',
            'permissions'=> '[{"Users":{"create":false,"view":false,"edit":false,"delete":false,"list":false}},{"Roles":{"create":true,"view":false,"edit":true,"delete":true,"list":false}}]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
