<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Comentario;
use App\Models\User;
class SolucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Producto::all() as $producto){
            $user= User::find(random_int(1,count(User::all())));
            Comentario::factory(random_int(2,15))->create(['producto_id' => $producto->id,
                                                            'user_id' => 23]);
        }
    }
}
