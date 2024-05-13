<?php

namespace Database\Seeders;

use App\Models\Discussion;
use App\Models\User;
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
        User::create([
            'username' => 'jeffry',
            'email' => 'jeffry016@binus.ac.id',
            'password' => bcrypt('password'),
            'is_admin' => '1',
        ]);

        User::factory(5)->create();

        Discussion::factory(50)->create();
    }
}
