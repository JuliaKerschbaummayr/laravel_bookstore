<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = new \App\Author;
        $author1->firstName = 'Ines';
        $author1->lastName = 'Scheuer';
        $author1->save();

        $author2 = new \App\Author;
        $author2->firstName = 'Elli';
        $author2->lastName = 'Radinger';
        $author2->save();

        $author3 = new \App\Author;
        $author3->firstName = 'Christina';
        $author3->lastName = 'Sondermann';
        $author3->save();
    }
}
