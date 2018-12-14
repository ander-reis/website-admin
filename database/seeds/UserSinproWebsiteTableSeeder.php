<?php

use Illuminate\Database\Seeder;

class UserSinproWebsiteTableSeeder extends Seeder
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
