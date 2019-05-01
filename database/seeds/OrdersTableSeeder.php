<?php

use App\Order;
use App\Book;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Order 1

        $order = new Order();
        $order->orderDate = new DateTime('2019-04-25 14:55');
        $order->price = 53.5;

//        get the last user - not admin - and add to order
        $user = \App\User::all()->last();
        $order->user()->associate($user);
        $order->save();

//        all ids
        $books = Book::all()->pluck('id');
        $order->books()->sync($books);
        $order->save();


        //Order 2

        $order2 = new Order();
        $order2->orderDate = new DateTime('2019-04-27 14:55');
        $order2->price = 14.5;

//        get the last user - not admin - and add to order
        $order2->user()->associate($user);
        $order2->save();

//        first book
        $bookFirst = Book::all()->pluck('id')->first();
        $order2->books()->attach($bookFirst);
        $order2->save();


        //Order 3

        $order3 = new Order();
        $order3->orderDate = new DateTime('2019-05-01 10:30');
        $order3->price = 36.50;

//        get the last user - not admin - and add to order
        $order3->user()->associate($user);
        $order3->save();

//        first and last book
        $bookLast = Book::all()->pluck('id')->last();

        $order3->books()->attach($bookFirst, ['amount' => 2]);
        $order3->books()->attach($bookLast, ['amount' => 3]);
        $order3->save();


        //Order 4

        $order4 = new Order();
        $order4->orderDate = new DateTime('2019-05-01 16:30');
        $order4->price = 14.50;

//        get the second user - not admin - and add to order
        $secondUser = \App\User::all()->get('id', 2);
        $order4->user()->associate($secondUser);
        $order4->save();

        $order4->books()->attach($bookFirst);
        $order4->save();
    }
}
