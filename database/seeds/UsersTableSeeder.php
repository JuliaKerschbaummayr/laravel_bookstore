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
        //backend user
        $user = new \App\User;
        $user->name = 'testuser';
        $user->isadmin = true;
        $user->email = 'test@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();

        //frontend user
        $user2 = new \App\User;
        $user2->name = 'customer';
        $user2->isadmin = false;
        $user2->email = 'customer@gmail.com';
        $user2->password = bcrypt('customersecret');
        $user2->firstname = 'Julia';
        $user2->lastname = 'Kerschbaummayr';
        $user2->street = 'Musterstrasse';
        $user2->street_number = 22;
        $user2->zip = 4261;
        $user2->city = 'Rainbach';
        $user2->country = 'Austria';
        $user2->save();
    }
}
