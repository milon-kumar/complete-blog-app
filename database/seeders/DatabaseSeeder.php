<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Service;
use App\Models\Tag;
use App\Models\User;
use App\Models\Works;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'Admin',
             'is_admin'=>1,
             'password'=>Hash::make('admin@example.com'),
             'email' => 'admin@example.com',
         ]);

         User::factory()->create([
             'name' => ' User',
             'is_admin'=>0,
             'password'=>Hash::make('user@example.com'),
             'email' => 'user@example.com',
         ]);

        Category::factory(5)->create();
        Tag::factory(5)->create();
        Blog::factory(5)->create();
        Comment::factory(5)->create();
        Like::factory(5)->create();
        Service::factory(5)->create();
        Works::factory(5)->create();
    }
}
