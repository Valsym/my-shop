<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            ProductSeeder::class,
            MainPageSeeder::class,
        ]);

        // Добавим еще 20 продуктов с фото и комментами:
        Product::factory()->count(20)->create();
        Comment::factory()->count(80)->create();
//
//        $this->call([
//            ProductImageSeeder::class,
//        ]);
    }
}
