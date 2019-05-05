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
        $user2->password = bcrypt('customer');
        $user2->firstname = 'Julia';
        $user2->lastname = 'Kerschbaummayr';
        $user2->street = 'Musterstrasse';
        $user2->street_number = 22;
        $user2->zip = 4261;
        $user2->city = 'Rainbach';
        $user2->country = 'Austria';
        $user2->save();

        $user3 = new \App\User;
        $user3->name = 'customer';
        $user3->isadmin = false;
        $user3->email = 'mustermann@gmail.com';
        $user3->password = bcrypt('mustermann');
        $user3->firstname = 'Max';
        $user3->lastname = 'Mustermann';
        $user3->street = 'Musterstrasse';
        $user3->street_number = 2;
        $user3->zip = 4040;
        $user3->city = 'Linz';
        $user3->country = 'Austria';
        $user3->save();
    }
}
