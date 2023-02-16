<?php

namespace App\Domain\Postlike\Database\Factories;

use App\Domain\Postlike\Entities\Postlike;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostlikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Postlike::class;

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