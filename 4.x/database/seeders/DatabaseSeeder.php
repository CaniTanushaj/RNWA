<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::create(
            ['name'=>'Action']
    );
    Category::create(
        ['name'=>'Comedy']
);
Category::create(
    ['name'=>'Drama']
);
Category::create(
    ['name'=>'Sci-fi']
);
Category::create(
    ['name'=>'Horror']
);
Category::create(
    ['name'=>'Adventure']
);
    }
}
