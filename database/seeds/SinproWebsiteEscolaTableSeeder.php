<?php

use Illuminate\Database\Seeder;

class SinproWebsiteEscolaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\EscolaWebsite::class, 3)->create();
    }
}
