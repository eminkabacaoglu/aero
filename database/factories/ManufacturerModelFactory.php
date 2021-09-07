<?php

namespace Database\Factories;

use App\Models\ManufacturerModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManufacturerModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ManufacturerModel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                // 'manufacturer_id' => 1,
                // 'model_name' => $this->faker->word()
        ];
    }
}
