<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'birthday' => $this->faker->dateTime,
            'occupations' => [
                'key_1' => $this->faker->randomNumber(),
                'key_2' => $this->faker->sentence,
            ],
            'img' =>  Str::random(20),
            'nickname' => Str::random(10),
            'portrayed' =>  Str::random(10)
        ];
    }
}
