<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\User;
use App\Models\Folder;
use Database\Factories\UserFactory;
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
        User::Factory(5)->create();

        Folder::factory(5)->create([
//            'user_id' => 1
        ]);

        Task::factory(5)->create([
            'folder_id' => 1
        ]);

    }
}
