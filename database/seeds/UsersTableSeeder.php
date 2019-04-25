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
        $user->email = 'test@gmail.com';
        $user->password = bcrypt('secret');
        $user->save();

        //frontend user
        $user2 = new \App\User;
        $user2->name = 'customer';
        $user2->email = 'customer@gmail.com';
        $user2->password = bcrypt('customersecret');
        $user2->save();
    }
}
