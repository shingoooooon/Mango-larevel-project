<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'username' => $user,
                'email' => $user . '@gmail.com',
                'password' => bcrypt('111111'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // Create Admin User
        DB::table('users')->insert([
            'username' => 'shingo',
            'email' => 'shingo@gmail.com',
            'password' => bcrypt('111111'),
            'is_admin' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
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
                'due_date' => '10/28/2023',
                'folder_id' => 1,
            ]);
        }

    }
}
