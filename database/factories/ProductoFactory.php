<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categorias = ["Pastas", "Ensaladas", "Arroz", "Carnes", "Pescado", "Postres"];
        return [
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->text,
            'categoria' => $categorias[random_int(0, count($categorias) -1 )],
            'cantidad' => $this->faker->numberBetween(0,4),
            'precio' => $this->faker->randomFloat(2, 0, 35.00),
            'imagen' => 'default' .  strval(random_int(0,9)) . '.jpeg',
        ];
    }
}
