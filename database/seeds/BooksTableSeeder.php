<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Facades;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*\Illuminate\Support\Facades\DB::table('books')->insert([
           'title' => 'Herr der Ringe',
           'isbn' => '1234567890',
           'subtitle' => 'Rückkehr des Königs',
           'rating' => 10,
           'description' => 'Letzter Teil der Trilogie',
           'published' => new DateTime()
        ]);*/

        //Book 1

        $book = new \App\Book;
        $book->title = 'Abgeleint!';
        $book->isbn = '1234567890';
        $book->subtitle = 'Entspannt ohne Leine unterwegs';
        $book->price = 14.5;
        $book->rating = 10;
        $book->description = 'Fast jeder Hundebesitzer wünscht sich, seinem Hund Freilauf ohne Leine zu ermöglichen.';
        $book->published = new DateTime();

//        get the first user - admin - and add to book
        $user = \App\User::all()->first();
        $book->user()->associate($user);
        $book->save();

//        first author
        $firstAuthor = \App\Author::all()->pluck('id')->first();
        $book->authors()->attach($firstAuthor);

//        add images to book
        $image1 = new \App\Image;
        $image1->title = 'Abgeleint 1';
        $image1->url = 'https://images-na.ssl-images-amazon.com/images/I/51n4zA-ExFL._SX350_BO1,204,203,200_.jpg';
        $image1->book()->associate($book);
        $image1->save();

        $image2 = new \App\Image;
        $image2->title = 'Abgeleint 2';
        $image2->url = 'https://m.media-amazon.com/images/S/aplus-media/vc/bdeed434-c2a9-45fa-8dd9-455a22376be3._CR0,0,300,400_PT0_SX300__.jpg';
        $image2->book()->associate($book);
        $image2->save();


        //Book 2

        $book2 = new \App\Book;
        $book2->title = 'Die Weisheit alter Hunde';
        $book2->isbn = '1234567891';
        $book2->subtitle = 'Was wir von grauen Schnauzen über das Leben lernen können';
        $book2->price = 22;
        $book2->rating = 8;
        $book2->description = 'Hunde sind großartig – egal in welchem Alter!';
        $book2->published = new DateTime();

//        add admin to book
        $book2->user()->associate($user);
        $book2->save();

//        second author
        $secondAuthor = \App\Author::all()->pluck('id')->get('id', 2);
        $book2->authors()->attach($secondAuthor);

//        add images to book
        $image3 = new \App\Image;
        $image3->title = 'Alte Hunde 1';
        $image3->url = 'https://images-na.ssl-images-amazon.com/images/I/51aGxo3P6JL._SX309_BO1,204,203,200_.jpg';
        $image3->book()->associate($book2);
        $image3->save();


        //Book 3

        $book3 = new \App\Book;
        $book3->title = 'Denksport für Hunde';
        $book3->isbn = '1234567892';
        $book3->subtitle = 'Knobelspiele schnell und einfach selbstgemacht';
        $book3->price = 17;
        $book3->rating = 9;
        $book3->description = 'Für einen ausgeglichenen und glücklichen Hund ist geistige Auslastung genauso wichtig wie das tägliche Gassigehen.';
        $book3->published = new DateTime();

//        add admin to book
        $book3->user()->associate($user);
        $book3->save();

//        last and first author
        $lastAuthor = \App\Author::all()->pluck('id')->last();
        $book3->authors()->attach($lastAuthor);
        $book3->authors()->attach($firstAuthor);

//        add images to book
        $image4 = new \App\Image;
        $image4->title = 'Denksport 1';
        $image4->url = 'https://images-na.ssl-images-amazon.com/images/I/51zhyFuWR8L._SX363_BO1,204,203,200_.jpg';
        $image4->book()->associate($book3);
        $image4->save();
    }
}
