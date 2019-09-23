<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'nome' => 'ANDERSON',
            'username' => 'anderson',
            'senha' => bcrypt('ander2515'),
            'remember_token' => str_random(10),
        ]);
    }
}
