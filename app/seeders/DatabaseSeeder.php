<?php

namespace App\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call([
            //  Добавление городов и пользователей
            UserSeeder::class,
            // Добавление категорий, постов и картинок
            PostSeeder::class,
        ]);
    }
}
