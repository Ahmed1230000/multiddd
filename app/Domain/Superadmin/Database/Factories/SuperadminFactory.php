<?php

namespace App\Domain\Superadmin\Database\Factories;

use App\Domain\Superadmin\Entities\Superadmin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SuperadminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Superadmin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
        ];
    }
}