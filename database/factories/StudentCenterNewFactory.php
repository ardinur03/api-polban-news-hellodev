<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentCenterNew>
 */
class StudentCenterNewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $new = \App\Models\News::factory()->create();

        return [
            'new_id' => $new->id,
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            'campus_organization_code' => 'BEM',
        ];
    }
}
