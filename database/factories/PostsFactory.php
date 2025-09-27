<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(3, 8));

        return [
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => fake()->paragraphs(rand(3, 10), true),
            'image' => fake()->imageUrl(800, 600, 'posts', true),
            'published' => fake()->boolean(70), // 70% Chance auf published
            'likes' => fake()->numberBetween(0, 1000),
        ];
    }

    /**
     * Indicate that the post is published.
     */
    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'published' => true,
        ]);
    }

    /**
     * Indicate that the post is unpublished/draft.
     */
    public function draft(): static
    {
        return $this->state(fn (array $attributes) => [
            'published' => false,
        ]);
    }

    /**
     * Create a popular post with many likes.
     */
    public function popular(): static
    {
        return $this->state(fn (array $attributes) => [
            'likes' => fake()->numberBetween(500, 5000),
            'published' => true,
        ]);
    }

    /**
     * Create a post with a specific user.
     */
    public function forUser(User $user): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $user->id,
        ]);
    }

    /**
     * Create a gaming-related post (für Ihr Logus-Projekt).
     */
    public function gaming(): static
    {
        $gamingTitles = [
            'Die besten Indie-Games 2025',
            'Gaming-Trends die du nicht verpassen solltest',
            'Retro-Gaming: Warum alte Spiele wieder cool sind',
            'Die Zukunft von Virtual Reality Gaming',
            'Multiplayer vs. Singleplayer: Was ist besser?',
            'Gaming Hardware Guide für Einsteiger',
            'Die besten kostenlosen Spiele des Jahres',
            'Esports: Mehr als nur ein Hobby',
        ];

        $title = fake()->randomElement($gamingTitles);

        return $this->state(fn (array $attributes) => [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => fake()->paragraphs(rand(5, 12), true) . "\n\n" .
                "Tags: #gaming #logus #spiele #review",
            'image' => fake()->imageUrl(800, 600, 'games', true),
        ]);
    }
}
