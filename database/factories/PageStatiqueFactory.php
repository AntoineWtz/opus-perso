<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\PageStatique;
use App\Models\User;

class PageStatiqueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PageStatique::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'titre' => $this->faker->word,
            'descriptif' => $this->faker->text,
            'ordre' => $this->faker->numberBetween(-10000, 10000),
            'zone' => $this->faker->randomElement(["header","footer"]),
            'visibilite' => $this->faker->randomElement(["Actif","Inactif"]),
        ];
    }
}
