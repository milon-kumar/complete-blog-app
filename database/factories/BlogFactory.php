<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->text(20);
        return [
            'user_id'=>1,
            'title'=>$title,
            'slug'=>Str::slug($title),
            'description'=>$this->faker->text(2410),
            'image'=>'uploads/default.jpg',
            'status'=>rand(0,1),
        ];
    }
}
