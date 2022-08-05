<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        Blog::factory(25)->create();

        // Blog::create([
        //     'name' => 'fonko',
        //     'text' => 'Lorem ipsum asdasd asdasd asdasd.',
        //     'author' => 'honza'
        // ]);

        // Blog::create([
        //     'name' => 'top 1 how to money',
        //     'text' => 'Lorem ipsum asdasd asdasd asdasd.',
        //     'author' => 'honza'
        // ]);

        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
