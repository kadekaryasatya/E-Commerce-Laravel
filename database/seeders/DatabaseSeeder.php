<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([

            'name' => 'Vanny Clarita',

            'username' => 'vannyclarita@gmail.com',

            'password' => Hash::make('vanny123'),

            'phone' => '0821473960666'

        ]);
    }
}
