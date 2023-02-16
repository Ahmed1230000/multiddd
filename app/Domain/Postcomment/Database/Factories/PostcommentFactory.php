<?php

namespace App\Domain\Postcomment\Database\Factories;

use App\Domain\Postcomment\Entities\Postcomment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostcommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Postcomment::class;

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