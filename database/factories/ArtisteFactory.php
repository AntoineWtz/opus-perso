<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Artiste;

class ArtisteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artiste::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'media_id' => Media::factory(),
            'nom' => $this->faker->word,
            'descriptif' => $this->faker->text,
            'lien_facebook' => $this->faker->word,
            'lien_youtube' => $this->faker->word,
            'lien_twiiter' => $this->faker->word,
            'lien_instagram' => $this->faker->word,
        ];
    }
}
