<?php

namespace App\Domain\Postcomment\Database\Seeds;

use Illuminate\Database\Seeder;
use App\Domain\Postcomment\Entities\Postcomment;

class PostcommentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Postcomment::factory(1000)->times(50);
    }
}
