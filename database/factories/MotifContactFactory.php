<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MotifContact;

class MotifContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MotifContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'motif' => $this->faker->word,
            'email' => $this->faker->safeEmail,
            'visibilite' => $this->faker->randomElement(["Actif","Inactif"]),
            'ordre' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
