<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpresaFactory extends Factory
{
    protected $model = Empresa::class;

    public function definition()
    {
        return [
			'nombre_empresa' => $this->faker->name,
			'fecha_inicio_contrato' => $this->faker->name,
			'fecha_fin_contrato' => $this->faker->name,
			'valor_contrato' => $this->faker->name,
			'pago_mensual' => $this->faker->name,
			'borrado' => $this->faker->name,
        ];
    }
}
