<?php

namespace App\Domain\Postlike\Database\Seeds;

use Illuminate\Database\Seeder;
use App\Domain\Postlike\Entities\Postlike;

class PostlikeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Postlike::factory(1000)->times(50);
    }
}
