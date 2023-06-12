<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Evenement;
use App\Models\Lieux;
use App\Models\TypeEvenement;

class EvenementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evenement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_evenement_id' => TypeEvenement::factory(),
            'lieux_id' => Lieux::factory(),
            'titre' => $this->faker->word,
            'descriptif' => $this->faker->text,
            'date_event' => $this->faker->date(),
            'billeterie' => $this->faker->word,
            'mise_en_avant' => $this->faker->randomElement(["oui","non"]),
            'visibilite' => $this->faker->randomElement(["Actif","Inactif"]),
        ];
    }
}
