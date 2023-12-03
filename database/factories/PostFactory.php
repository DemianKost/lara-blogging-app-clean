<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->words(5, true);


        return [
            'title' => $title,
            'slug' => Str::slug( $title ),
            'body' => $this->faker->randomHtml,
            'description' => $this->faker->sentences(2, true),
            'published' => $this->faker->boolean,
        ];
    }
}
