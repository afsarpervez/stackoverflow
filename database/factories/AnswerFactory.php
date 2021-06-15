<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->paragraphs(rand(3,7), true),
            // 'vote_count' => rand(-3, 5),
            'user_id' => User::pluck('id')->random(),            
        ];
    }
}
