<?php

namespace Database\Factories;

use App\Models\Documento;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DocumentoFactory extends Factory
{
    protected $model = Documento::class;

    public function definition()
    {
        return [
			'DOC_NOMBRE' => $this->faker->name,
			'DOC_CODIGO' => $this->faker->name,
			'DOC_CONTENIDO' => $this->faker->name,
			'DOC_ID_TIPO' => $this->faker->name,
			'DOC_ID_PROCESO' => $this->faker->name,
        ];
    }
}
