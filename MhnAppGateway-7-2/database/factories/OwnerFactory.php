<?php

namespace Database\Factories;

use App\Models\Owner;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class OwnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Owner::class;

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
        );
    }
}
