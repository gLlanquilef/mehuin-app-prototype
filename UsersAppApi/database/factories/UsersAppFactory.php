<?php

namespace Database\Factories;

use App\Models\UsersApp;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersAppFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UsersApp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        return array(
            'gender' => $gender = $faker->randomElement(array('male','female')),
            'name' => $this->faker->name($gender),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'mail' => $this->faker->unique()->safeEmail,
            'type' => $this->$faker->randomElement(array('customer','owner','developer')),
        );
    }
}
