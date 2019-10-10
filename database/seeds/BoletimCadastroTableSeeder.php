<?php

use Illuminate\Database\Seeder;

class BoletimCadastroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\BoletimCadastro::class, 20)->create();
    }
}
