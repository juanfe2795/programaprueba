<?php

namespace Database\Factories;

use App\Models\Ahorro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AhorroFactory extends Factory
{
    protected $model = Ahorro::class;

    public function definition()
    {
        return [
			'nombre_ahorro' => $this->faker->name,
			'concepto' => $this->faker->name,
			'valor' => $this->faker->name,
			'ingresos_id' => $this->faker->name,
			'borrado' => $this->faker->name,
        ];
    }
}
