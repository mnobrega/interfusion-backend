<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //Sentinel
        $this->call('GroupSeeder');
        $this->call('UserSeeder');
        $this->call('UserGroupSeeder');

        Model::reguard();
    }
}
