<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'ADMIN',
                'email' => 'admin@gmail.com',
                'is_admin' => 1,
                'password' => Hash::make('manager123'),
                'NIM' => 'manager123',
                'phone_number' => 'manager123',
                'gender' => 'Male',
                'organization_admin_id' => '1'
            ],
        ]);
    }
}
