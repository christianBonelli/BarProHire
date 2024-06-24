<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Photo;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{

    // protected $model = Photo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'salary'=>fake()->randomElement(['15 €/h', '10 €/h' , '200€ a servizio', '150€ a servizio']),
            'description'=>fake()->realText(),
            'featured'=>fake()->randomElement([true, false]),
        ];
    }
    // public function configure()
    // {
    //     return $this->afterCreating(function (Post $post) {
    //         // Crea 1-3 foto per il post
    //         $post->photos()->createMany(Photo::factory()->count(rand(1, 3))->make()->toArray());
    //     });
    // }
}
