<?php

namespace App\Domain\Superadmin\Database\Seeds;

use Illuminate\Database\Seeder;
use App\Domain\Superadmin\Entities\Superadmin;

class SuperadminTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Superadmin::factory(1000)->times(50);
    }
}
