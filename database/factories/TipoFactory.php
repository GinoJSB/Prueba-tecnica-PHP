<?php

namespace Database\Factories;

use App\Models\Tipo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipoFactory extends Factory
{
    protected $model = Tipo::class;

    public function definition()
    {
        return [
			'TIP_NOMBRE' => $this->faker->name,
			'TIP_PREFIJO' => $this->faker->name,
        ];
    }
}
