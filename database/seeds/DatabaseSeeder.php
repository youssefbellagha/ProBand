<?php

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
        // $this->call(UserSeeder::class);

        $user = \App\User::create([
            'name' => 'super_admin',
            'email' => 'super@admin.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
