<?php

namespace Database\Factories;

use App\Models\Ingreso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IngresoFactory extends Factory
{
    protected $model = Ingreso::class;

    public function definition()
    {
        return [
			'nombre_ingreso' => $this->faker->name,
			'concepto' => $this->faker->name,
			'valor' => $this->faker->name,
			'borrado' => $this->faker->name,
        ];
    }
}
