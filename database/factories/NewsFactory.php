<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence(random_int(3, 5));
        $content = fake()->paragraphs(random_int(3, 5), true);
        $reading_time = Str::length($content) / 1000;
        $brief_overview = Str::substr($content, 0, 250);

        return [
            'user_id' => 2,
            'title' => $title,
            'slug' => str_replace(' ', '-', $title),
            'brief_overview' => $brief_overview,
            'content' => $content,
            'reading_time' => $reading_time,
            'status' => 'published',
        ];
    }
}
