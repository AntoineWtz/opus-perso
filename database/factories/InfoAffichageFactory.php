<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\InfoAffichage;
use App\Models\Medium;

class InfoAffichageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InfoAffichage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'media_id' => Medium::factory(),
            'titre' => $this->faker->word,
            'descriptif' => $this->faker->text,
            'zone' => $this->faker->randomElement(["1","2"]),
            'visibilite' => $this->faker->randomElement(["Actif","Inactif"]),
            'ordre' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
