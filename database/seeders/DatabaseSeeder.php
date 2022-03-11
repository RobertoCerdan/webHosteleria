<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Producto;
use App\Models\Comentario;
use App\Models\User;


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
        User::factory()->count(30)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
        
        
        
        foreach(Producto::all() as $producto){
            $user= User::find(random_int(1,count(User::all())));
            Comentario::factory(random_int(2,15))->create(['producto_id' => $producto->id,
                                                            'user_id' => 23]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
    }
}
