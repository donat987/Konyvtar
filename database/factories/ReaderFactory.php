<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reader>
 */
class ReaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->Name(),
            'dateOfBirth' => $this->faker->date($format = 'Y-m-d', $max = '2008-01-01'),
            'mobilNumber' => "+3630" . $this->faker->numerify('#######'),
            'email' => $this->faker->freeEmail(),
            'townID' => $this->faker->numerify('####'),
            'town' => $this->faker->city(),
            'street' => $this->faker->streetName()." utca",
            'houseNumber' => $this->faker->numberBetween(1, 50),
            'motherName' => $this->faker->name('female'),
            'type' => $this->faker->numberBetween(1, 5),
            'personID'=> $this->faker->numerify('######'). $this->faker->lexify('??'),
        ];
    }
}
