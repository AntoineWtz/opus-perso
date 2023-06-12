<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Lieux;
use App\Models\Media;
use App\Models\TypeMedia;
use App\Models\User;

class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_media_id' => TypeMedia::factory(),
            'user_id' => User::factory(),
            'lieux_id' => Lieux::factory(),
            'chemin' => $this->faker->word,
            'titre' => $this->faker->word,
            'balise_alt' => $this->faker->word,
            'modifieur' => $this->faker->word,
            'photographe' => $this->faker->word,
        ];
    }
}
