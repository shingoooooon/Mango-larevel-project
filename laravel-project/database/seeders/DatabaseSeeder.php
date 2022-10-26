<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\User;
use App\Models\Folder;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create Normal Users
        $users = ['mike', 'miho', 'mizuho', 'kuni'];
        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user,
                'email' => $user . '@gmail.com',
                'password' => bcrypt('111111'),
            ]);
        }

        // Create Admin User
        DB::table('users')->insert([
            'name' => 'shingo',
            'email' => 'shingo@gmail.com',
            'password' => bcrypt('111111'),
            'is_admin' => true,
        ]);

        // Create Folders
        $folders = ['Private', 'Work', 'Others'];
        foreach ($folders as $folder) {
            DB::table('folders')->insert([
                'title' => $folder,
                'user_id' => 5,
            ]);
        }

        // Create Tasks
        $tasks = ['Laundry', 'Cooking', 'Cleaning', 'task4', 'task5', 'task6', 'task7', 'task8', 'task9', 'task10'];
        foreach ($tasks as $task) {
            DB::table('tasks')->insert([
                'name' => $task,
                'due_date' => Carbon::tomorrow(),
                'folder_id' => 1,
            ]);
        }

    }
}
