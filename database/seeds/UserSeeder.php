<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        Sentry::getUserProvider()->create(array(
            'email'    => 'marcio.nobrega@sapo.pt',
            'username' => 'mnobrega',
            'password' => 'mlno123',
            'activated' => 1,
        ));

        Sentry::getUserProvider()->create(array(
            'email'    => 'user@user.com',
            'username' => 'user',
            'password' => 'user',
            'activated' => 1,
        ));
    }
}
