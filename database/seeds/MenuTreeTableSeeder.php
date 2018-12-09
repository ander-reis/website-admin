<?php

use Illuminate\Database\Seeder;

class MenuTreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Menu::class, 1)->create();
    }
}
