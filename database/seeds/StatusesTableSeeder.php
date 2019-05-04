<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Statuses for Order 1

        $status = new \App\Status();
        $status->status = 'Offen';
        $status->changeDate = new DateTime('2019-04-25 14:55');

        $order1 = \App\Order::all()->first();
        $status->order()->associate($order1);
        $status->save();

        $status2 = new \App\Status();
        $status2->status = 'Bezahlt';
        $status2->changeDate = new DateTime('2019-04-27 18:05');

        $status2->order()->associate($order1);
        $status2->save();


        $status3 = new \App\Status();
        $status3->status = 'Versendet';
        $status3->changeDate = new DateTime('2019-04-28 10:00');

        $status3->order()->associate($order1);
        $status3->save();


        //Statuses for Order 2

        $status4 = new \App\Status();
        $status4->status = 'Offen';
        $status4->changeDate = new DateTime('2019-04-27 15:55');

        $order2 = \App\Order::all()->get('id', 2);
        $status4->order()->associate($order2);
        $status4->save();


        $status5 = new \App\Status();
        $status5->status = 'Storniert';
        $status5->changeDate = new DateTime('2019-04-28 20:10');
        $status5->comment = 'Irrtümlich bestellt';

        $status5->order()->associate($order2);
        $status5->save();


        //Statuses for Order 3

        $status5 = new \App\Status();
        $status5->status = 'Offen';
        $status5->changeDate = new DateTime('2019-05-01 10:30');

        $order3 = \App\Order::all()->get('id', 3);
        $status5->order()->associate($order3);
        $status5->save();


        //Statuses for Order 4

        $status5 = new \App\Status();
        $status5->status = 'Offen';
        $status5->changeDate = new DateTime('2019-05-01 10:30');

        $order4 = \App\Order::all()->last();
        $status5->order()->associate($order4);
        $status5->save();
    }
}
