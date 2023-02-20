<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Apellido;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(100)->create();

        // \App\Models\
        $user = User::factory()->create([
             'name' => 'Gerson',
             'email' => 'toge619@gmail.com',
         ]);

         Apellido::factory()->create([
            'user_id' =>$user->id,
            'lastname' => 'Rocka',
         ]);

        Apellido::factory(100)->create();
    }
}
