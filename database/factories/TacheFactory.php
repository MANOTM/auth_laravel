<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tache>
 */
class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'expiration'=>fake()->date($format = 'Y-m-d', $max = 'now'),
            'categorie'=>fake()->words($nbWords=1,$variableNbWords = true),
            'description'=>fake()->realText($maxNbChars = 20, $indexSize = 2),
            'accomplie'=>'N',
            'user_id'=>1,
        ];
    }
}
