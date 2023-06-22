<?php

namespace Database\Factories;

use App\Models\Proceso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProcesoFactory extends Factory
{
    protected $model = Proceso::class;

    public function definition()
    {
        return [
			'PRO_PREFIJO' => $this->faker->name,
			'PRO_NOMBRE' => $this->faker->name,
        ];
    }
}
