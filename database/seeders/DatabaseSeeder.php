<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use App\Models\Category;
use App\Models\CategoryBook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('authors');
        Storage::makeDirectory('authors');
        Storage::deleteDirectory('books');
        Storage::makeDirectory('books');
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Miguel Carrillo',
            'email' => 'miguel@miguel.com',
            'password' => bcrypt('123456789')
        ]);
        Author::factory(10)->create();
        Book::factory(10)->create();
        AuthorBook::factory(10)->create();
        Category::factory(10)->create();
        CategoryBook::factory(10)->create();
    }
}
