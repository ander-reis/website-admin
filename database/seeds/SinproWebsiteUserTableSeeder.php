<?php

use Illuminate\Database\Seeder;

class SinproWebsiteUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\UsersWebsite::class, 1)->create();
    }
}
