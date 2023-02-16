<?php

namespace App\Domain\Post\Database\Seeds;

use Illuminate\Database\Seeder;
use App\Domain\Post\Entities\Post;

class PostTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Post::factory(1000)->times(50);
    }
}
