<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Horse;
use App\Models\User;

class HorseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Horse::class;

    public function definition()
    {
        return [
         'user_id' => User::factory(),
         'date' => $this->faker->dateTimeThisDecade()->format('Y-m-d'),
         'race' => $this->faker->word(),
         'horse_name' => $this->faker->word(),
         'mark' => $this->faker->numberBetween(1,6),
         'opinion' => $this->faker->text()
        ];
    }
}
