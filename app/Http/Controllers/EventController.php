<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\CategoryDescription;
use App\Models\Event;
use App\Models\EventAssistant;
use App\Models\EventDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;
use Yajra\DataTables\DataTables;

class EventController extends Controller
{
    //
    public function index(Request $request)
    {


        $events = Event::join('event_descriptions', 'events.id', '=', 'event_descriptions.event_id')
            ->join('categories', 'categories.id', '=', 'events.category_id')
            ->join('category_descriptions', 'category_descriptions.category_id', '=', 'categories.id')
            ->select(
                'events.id',
                'event_descriptions.name as name',
                'category_descriptions.name as category',
                'events.capacity as capacity'
            )
            ->where('event_descriptions.language', $request->language)
            ->where('category_descriptions.language', $request->language)
            ->get();


        foreach ($events as $event) {
            # code...
            $eventCapacity = $event->capacity;
            $eventAssistants = Event::find($event->id)->eventAssistants->count();
            $eventAssistantsAvailable = $eventCapacity - $eventAssistants;
            $event['capacityAvailable'] = $eventAssistantsAvailable;
        }
        return  view('events.index', compact('events'));
        
    }

    public function create()
    {
        /* $categories = CategoryDescription::get()->groupBy('language'); */
        $categories = Category::all();
        return view('events.create', compact('categories'));
    }

    public function show(Event $event)
    {
        $category = $event->category;
/*         $categoryDescription = $category->categoryDescriptions;
 */        
        $eventDescription=$event->eventDescriptions;
 return view('events.show', compact('event', 'category', 'eventDescription'));
    }


    public function store(StoreEventRequest $request)
    {
        $event = new Event([
            'date' => $request->date,
            'slug' => $request->slug,
            'category_id' => $request->categoryId,
            'capacity' => $request->capacity
        ]);
        $event->save();

        $items = $request->eventDescription;
        foreach ($items as $item) {
            $eventDescription = new EventDescription([
                'language' => $item['language'],
                'name' => $item['name']
            ]);
            $event->eventDescriptions()->save($eventDescription);
        }
        return redirect('events')->with('status', '¡Evento creado con éxito!');

    }

    public function destroy(Event $event)
    {
        $event->eventDescriptions()->delete();
        $event->eventAssistants()->delete();
        $event->delete();
        return redirect('events')->with('status', '¡Evento eliminado con éxito!');
    }

    public function edit(Event $event)
    {
        $eventDescription = $event->eventDescriptions;
        $category = $event->category;
        $categoryDescription = $category->categoryDescriptions;
        $categories = Category::all();

        return view('events.edit', compact('event', 'eventDescription', 'category', 'categoryDescription', 'categories'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        //actualizar evento
        $event->slug = $request->slug;
        $event->date = $request->date;
        $event->capacity = $request->capacity;
        $event->category_id = $request->categoryId;
        $event->save();

        //eliminar y actualizar description de evento
        $newEventDescription = $request->eventDescription;
        $oldEventDescription = $event->eventDescriptions;
        foreach ($oldEventDescription as $key => $oldItem) {
            $bandera = false;
            foreach ($newEventDescription as $key => $newItem) {
                # code...
                if ($oldItem['language'] == $newItem['language']) {
                    $eventDescription = EventDescription::find($oldItem['id']);
                    $eventDescription->name = $newItem['name'];
                    $eventDescription->save();
                    $bandera = true;
                }
            }
            if ($bandera == false) {
                EventDescription::destroy($oldItem['id']);
            }
        }
        //agregar
        $oldEventDescription = $event->eventDescriptions;
        foreach ($newEventDescription as $key => $newItem) {
            $bandera = false;
            foreach ($oldEventDescription as $key => $oldItem) {
                # code...
                if ($oldItem['language'] == $newItem['language']) {
                    $bandera = true;
                }
            }
            if ($bandera == false) {
                $eventDescription = new EventDescription([
                    'language' => $newItem['language'],
                    'name' => $newItem['name']
                ]);
                $event->eventDescriptions()->save($eventDescription);
            }
        }
        return redirect('events')->with('status', '¡Evento actualizado con éxito!');
    }
}
