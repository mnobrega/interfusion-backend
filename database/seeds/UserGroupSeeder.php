<?php

use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_groups')->delete();

        $userUser = Sentry::getUserProvider()->findByLogin('user@user.com');
        $adminUser = Sentry::getUserProvider()->findByLogin('marcio.nobrega@sapo.pt');

        $userGroup = Sentry::getGroupProvider()->findByName('Users');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admins');

        // Assign the groups to the users
        $userUser->addGroup($userGroup);
        $adminUser->addGroup($userGroup);
        $adminUser->addGroup($adminGroup);
    }
}
