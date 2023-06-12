<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Lieux;
use App\Models\Publication;
use App\Models\TypePublication;
use App\Models\User;

class PublicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_publication_id' => TypePublication::factory(),
            'user_id' => User::factory(),
            'lieux_id' => Lieux::factory(),
            'titre' => $this->faker->word,
            'descriptif' => $this->faker->text,
            'toulousain' => $this->faker->randomElement(["oui","non"]),
            'resume_rs' => $this->faker->text,
            'statut' => $this->faker->randomElement(["Brouillon","Relecture","Valide"]),
        ];
    }
}
