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
        $book = new \App\Book;
        $book->title = 'Herr der Ringe';
        $book->isbn = '1234567890';
        $book->subtitle = 'Rückkehr des Königs';
        $book->price = 20;
        $book->rating = 10;
        $book->description = 'Letzter Teil der Trilogie';
        $book->published = new DateTime();

//        get the first user and add to book
        $user = \App\User::all()->first();
        $book->user()->associate($user);

//        speichern in DB
        $book->save();

//        alle ids sammeln
        $authors = \App\Author::all()->pluck('id');
        $book->authors()->sync($authors);

//        add images to book
        $image1 = new \App\Image;
        $image1->title = 'Cover 1';
        $image1->url = 'https://images-na.ssl-images-amazon.com/images/I/51bEpBADC%2BL._SX379_BO1,204,203,200_.jpg';
        $image1->book()->associate($book);
        $image1->save();

        $image2 = new \App\Image;
        $image2->title = 'Cover 2';
        $image2->url = 'https://images-na.ssl-images-amazon.com/images/I/81HOpBSO-UL.jpg';
        $image2->book()->associate($book);
        $image2->save();

//        update
        /*$book = App\Book::find(1);
        $book->title = 'Neuer Titel';
        $book->save();*/

//        delete
//        $book->delete();

//        findOrCreate updateOrCreate
        /*$book = App\Book::findOrCreate(['title'=>'Buchtitel']);
        $book = App\Book::updateOrCreate(['title'=>'Buchtitel'],['description'=>'Neue Beschreibung']);*/

//        Element in Beziehung einfügen
//        $book->images()->save($image);
//        $book->images()->saveMany([$image1, $image2]);

//        Beziehung neu setzen
//        $book->user()->associate($user1);

//        Beziehung entfernen
//        $book->user()->dissociate($user1);

//        $book->save();

//        N:M Beziehungen
//        $book->authors()->attach($authorId);
//        $book->authors()->detach($authorId);
//        $book->authors()->detach();

//        danach nur noch 1 2 3 drin
//        $book->authors()->sync([1, 2, 3]);
    }
}
