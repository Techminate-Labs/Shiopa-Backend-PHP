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
            'permissions'=> '{"Dashboard":{"create":true,"view":true,"edit":true,"delete":true,"list":true},"Users":{"create":true,"view":true,"edit":true,"delete":true,"list":true},"Roles":{"create":true,"view":true,"edit":true,"delete":true,"list":true},"POS":{"create":true,"view":true,"edit":true,"delete":true,"list":true},"Coupon":{"create":true,"view":true,"edit":true,"delete":true,"list":true},"Items":{"create":true,"view":true,"edit":true,"delete":true,"list":true},"Sales":{"create":true,"view":true,"edit":true,"delete":true,"list":true},"Config":{"create":true,"view":true,"edit":true,"delete":true,"list":true}}',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'name'=>'customer',
            'permissions'=> '{"Dashboard":{"create":false,"view":false,"edit":false,"delete":false,"list":false},"Users":{"create":false,"view":false,"edit":false,"delete":false,"list":false},"Roles":{"create":false,"view":false,"edit":false,"delete":false,"list":false},"POS":{"create":false,"view":false,"edit":false,"delete":false,"list":false},"Coupon":{"create":false,"view":false,"edit":false,"delete":false,"list":false},"Items":{"create":false,"view":false,"edit":false,"delete":false,"list":false},"Sales":{"create":false,"view":false,"edit":false,"delete":false,"list":false},"Config":{"create":false,"view":false,"edit":false,"delete":false,"list":false}}',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
