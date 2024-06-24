<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
use App\Models\Photo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{

    // protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(), // Questo crea un post se non ne esiste uno, ma generalmente sarà passato dalla configurazione del PostFactory
            'path' => fake()->imageUrl(300, 400, 'cocktails', true, 'Faker'),//Genera una url di una immagine fittizia
        ];
    }

    public function configure()
{
    return $this->afterCreating(function (Photo $photo) {
        // Ottieni un post casuale e collega la foto ad esso
        $post = Post::inRandomOrder()->first();
        $post->photos()->attach($photo->id);
    });
}
}
