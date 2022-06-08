<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Recovery;

class RecoveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Recovery::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'year' => $this->faker->date('Y'),
            'date' => $this->faker->date('Y-m'),
            'bet' => $this->faker->numberBetween(100, 10000),
            'refund' => $this->faker->numberBetween(100, 10000),

        ];
    }
}
