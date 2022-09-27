<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>1,
            'blog_id'=>rand(1,49),
            'name'=>$this->faker->name,
            'image'=>"default.jpg",
            'comment'=>$this->faker->text(120),
            'parent_id'=>rand(1,5),
        ];
    }
}
