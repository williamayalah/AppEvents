<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $event1=new Event();
        $event1->date= (Carbon::now())->toDateString();
        $event1->slug='real-madrid-vs-barcelona';
        $event1->capacity=60000;
        $event1->category_id=1;
        $event1->save();

        $event2=new Event();
        $event2->date= (Carbon::now())->toDateString();
        $event2->slug='blanca-nieves';
        $event2->capacity=2000;
        $event2->category_id=2;
        $event2->save();

        $event3=new Event();
        $event3->date= (Carbon::now())->toDateString();
        $event3->slug='la-bella-y-la-bestia';
        $event3->capacity=1500;
        $event3->category_id=2;
        $event3->save();

        $event4=new Event();
        $event4->date= (Carbon::now())->toDateString();
        $event4->slug='manchester-united-vs-liverpool';
        $event4->capacity=50000;
        $event4->category_id=1;
        $event4->save();
    }
}
