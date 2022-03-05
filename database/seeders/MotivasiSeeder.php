<?php

namespace Database\Seeders;

use App\Models\Motivasi;
use Illuminate\Database\Seeder;

class MotivasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Motivasi::factory()
        ->count(60)
        ->create();
    }
}
