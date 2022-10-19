<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::Factory()->create([
            'name' => 'Shingo',
            'email' => 'skksb75@gmail.com',
        ]);
        Folder::factory(5)->create([
            'user_id' => $user->id
        ]);
    }
}
