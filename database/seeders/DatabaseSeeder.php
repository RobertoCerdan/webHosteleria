<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Producto::factory()->count(70)->create();
       
        DB::table('users')->insert([
            'name'=>"admin",
            'telefono' => '111111111',
            'email'=>"admin@gmail.com",
            'password'=>Hash::make("12345678"),
            'rol'=>"admin",
        ]);

        DB::table('users')->insert([
            'name'=>"user",
            'telefono' => '111111111',
            'email'=>"user@gmail.com",
            'password'=>Hash::make("12345678"),
            'rol'=>"Cliente",
        ]);
    }
}
