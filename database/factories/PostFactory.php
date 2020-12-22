<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
        //call through tinker:
        // App\Models\Post::factory()->times(10)->create(['user_id'=>1]);
    {
        return [
            'body' => $this->faker->sentence(20),
        ];
    }
}
