<?php

use Illuminate\Database\Seeder;

class EscolaMesesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\EscolaMeses::class, 10)->create();
    }
}
