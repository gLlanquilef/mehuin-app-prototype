<?php

namespace Database\Seeders;

use App\Models\UsersApp;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $usersApp = UsersApp::factory()->count(50)->create();
    }
}
