<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // city_corporation
         DB::table('users')->insert([
            'role' => 'city_corporation',
            'name' => 'Demo City Corporation',
            'email' => 'city_corporation@mail.com',
            'password' => bcrypt('12345678'),
            'nid' => '12345678910',
            'address' => 'City Corporation Address',
            'mobile' => '01234567890',
            'created_at' => now(),
            'updated_at' => now()
        ]);

         // service_manager
         DB::table('users')->insert([
            'role' => 'service_manager',
            'name' => 'Demo Service Manager',
            'email' => 'service_manager@mail.com',
            'password' => bcrypt('12345678'),
            'nid' => '1254238910',
            'address' => 'Service Manager Address',
            'mobile' => '01234567890',
            'created_at' => now(),
            'updated_at' => now()
        ]);

         // support_staff
         DB::table('users')->insert([
            'role' => 'support_staff',
            'name' => 'Demo Support Staff',
            'email' => 'support_staff@mail.com',
            'password' => bcrypt('12345678'),
            'nid' => '15345643910',
            'address' => 'Support Staff Address',
            'mobile' => '01234567890',
            'created_at' => now(),
            'updated_at' => now()
        ]);

         // citizen
         DB::table('users')->insert([
            'role' => 'citizen',
            'name' => 'Demo Citizen',
            'email' => 'citizen@mail.com',
            'password' => bcrypt('12345678'),
            'nid' => '23345678910',
            'address' => 'Citizen Address',
            'mobile' => '01234567890',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
