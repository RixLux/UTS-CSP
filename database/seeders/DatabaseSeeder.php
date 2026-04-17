<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Book;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create categories
        $categories = ['Programming', 'Design', 'Marketing', 'Business'];
        foreach ($categories as $name) {
            $category = Category::create(['name' => $name]);

            // Create some books for each category
            Book::create([
                'category_id' => $category->id,
                'title' => "Mastering {$name}",
                'author' => "Expert in {$name}",
                'description' => "A comprehensive guide to {$name}.",
                'pdf_url' => "https://example.com/books/{$name}.pdf",
                'price' => rand(10, 100),
            ]);
        }
    }
}
