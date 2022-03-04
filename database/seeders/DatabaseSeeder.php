<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name'=>'Sergio',
            'email' => 'sergio@gmail.com',
            'telefono' => '777546342',
            'password' =>Hash::make('12345Abcde'),
            'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
            'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
            'rol'=> 'Admin',
        ]);
    }
}
