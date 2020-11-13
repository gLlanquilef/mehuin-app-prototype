<?php

namespace Database\Seeders;

use App\Models\UsersApp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
        $owners = UsersApp::factory()->count(50)->create();

    }
}
