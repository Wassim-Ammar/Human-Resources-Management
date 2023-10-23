<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ToDoItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(3)->create();
        // \App\Models\Vaccation::factory(1)->create([
        //     'user_id' => 1,
        // ]);
        // \App\Models\Announcement::factory(3)->create();
        // \App\Models\Meeting::factory(3)->create();
        //ToDoItem::factory(5)->create();
        \App\Models\User::factory()->create(['email' => "elbehi@gmail.com"]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
