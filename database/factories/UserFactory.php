<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role_id' => Role::factory(),
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => $this->faker->password,
            'nom' => $this->faker->word,
            'prenom' => $this->faker->word,
            'fonction' => $this->faker->word,
            'descriptif' => $this->faker->text,
            'derniere_connexion' => $this->faker->date(),
            'activite' => $this->faker->randomElement(["EnLigne","HorsLigne"]),
            'notification_csb' => $this->faker->randomElement(["oui","non"]),
            'notification_rs' => $this->faker->randomElement(["oui","non"]),
        ];
    }
}
