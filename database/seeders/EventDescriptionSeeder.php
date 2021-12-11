<?php

namespace Database\Seeders;

use App\Models\EventDescription;
use Illuminate\Database\Seeder;

class EventDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $eventDescription1=new EventDescription();
        $eventDescription1->name='Real Madrid vs Barcelona';
        $eventDescription1->language='es';
        $eventDescription1->event_id=1;
        $eventDescription1->save();

        $eventDescription2=new EventDescription();
        $eventDescription2->name='Real Madrid vs Barcelona';
        $eventDescription2->language='en';
        $eventDescription2->event_id=1;

        $eventDescription2->save();

        $eventDescription3=new EventDescription();
        $eventDescription3->name='Real Madrid vs Barcelona';
        $eventDescription3->language='gl';
        $eventDescription3->event_id=1;

        $eventDescription3->save();
        //
        $eventDescription4=new EventDescription();
        $eventDescription4->name='Blanca Nieves';
        $eventDescription4->language='es';
        $eventDescription4->event_id=2;

        $eventDescription4->save();

        $eventDescription5=new EventDescription();
        $eventDescription5->name='Snow White';
        $eventDescription5->language='en';
        $eventDescription5->event_id=2;

        $eventDescription5->save();

        $eventDescription6=new EventDescription();
        $eventDescription6->name='Brancaneves';
        $eventDescription6->language='gl';
        $eventDescription6->event_id=2;

        $eventDescription6->save();
        //
        $eventDescription7=new EventDescription();
        $eventDescription7->name='La Bella y la Bestia';
        $eventDescription7->language='es';
        $eventDescription7->event_id=3;

        $eventDescription7->save();

        $eventDescription8=new EventDescription();
        $eventDescription8->name='Beauty and the Beast';
        $eventDescription8->language='en';
        $eventDescription8->event_id=3;

        $eventDescription8->save();

        $eventDescription9=new EventDescription();
        $eventDescription9->name='A Bela e a Besta';
        $eventDescription9->language='gl';
        $eventDescription9->event_id=3;

        $eventDescription9->save();
        //
        $eventDescription10=new EventDescription();
        $eventDescription10->name='Manchester United vs Liverpool';
        $eventDescription10->language='es';
        $eventDescription10->event_id=4;

        $eventDescription10->save();

        $eventDescription11=new EventDescription();
        $eventDescription11->name='Manchester United vs Liverpool';
        $eventDescription11->language='en';
        $eventDescription11->event_id=4;

        $eventDescription11->save();

        $eventDescription12=new EventDescription();
        $eventDescription12->name='Manchester United vs Liverpool';
        $eventDescription12->language='gl';
        $eventDescription12->event_id=4;

        $eventDescription12->save();
    





    }
}
