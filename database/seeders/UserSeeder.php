<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' =>  'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 1,
            'upazila' => 'শেরপুর সদর উপজেলা',
            'union' => 'চরশেরপুর',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' =>  'mohsin',
            'email' => 'm_ohs_in@yahoo.com',
            'password' => Hash::make('password'),
            'role' => 2,
            'upazila' => 'শেরপুর সদর উপজেলা',
            'union' => 'চরশেরপুর',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        for ($i = 1; $i <= 12; $i++) {
            DB::table('users')->insert([
                'name' =>  Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'role' => 2,
                'upazila' => 'শেরপুর সদর উপজেলা',
                'union' => 'চরশেরপুর',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
