<?php

namespace Database\Factories;

use App\Models\Egreso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EgresoFactory extends Factory
{
    protected $model = Egreso::class;

    public function definition()
    {
        return [
			'nombre_egreso' => $this->faker->name,
			'concepto' => $this->faker->name,
			'valor' => $this->faker->name,
			'ingresos_id' => $this->faker->name,
			'borrado' => $this->faker->name,
        ];
    }
}
