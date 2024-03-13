<?php

namespace Database\Factories;

use App\Models\Deuda;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DeudaFactory extends Factory
{
    protected $model = Deuda::class;

    public function definition()
    {
        return [
			'nombre_deuda' => $this->faker->name,
			'concepto' => $this->faker->name,
			'valor' => $this->faker->name,
			'pagado' => $this->faker->name,
			'fecha_pago' => $this->faker->name,
			'valor_abono' => $this->faker->name,
			'info_abono' => $this->faker->name,
			'fecha_abono' => $this->faker->name,
			'ingresos_id' => $this->faker->name,
			'borrado' => $this->faker->name,
        ];
    }
}
