<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorageBuyTicketRequest;
use App\Jobs\SendMail;
use App\Models\Event;
use App\Models\event_assistant;
use App\Models\EventAssistant;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Reader\Xls\RC4;

class EventAssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorageBuyTicketRequest $request, Event $event)
    {
        $eventCapacity = $event->capacity;
        $eventAssistants = Event::find($event->id)->eventAssistants->count();
        $eventAssistantsAvailable = $eventCapacity - $eventAssistants;

        $this->validate(
            $request,
            ['quantity' => 'numeric|max:' . $eventAssistantsAvailable],
            ['quantity.max'=>'Solo hay '.$eventAssistantsAvailable.' entrada(s) disponible(s)']
        );

        for ($i = 0; $i < $request->quantity; $i++) {
            $eventAssistant = new EventAssistant([
                'event_id' => $event->id,
                'email' => $request->email
            ]);
            $eventAssistant->save();
        }
        SendMail::dispatch($event->slug, $event->date, $request->quantity, $request->email);
        return redirect('events')->with('status', '¡Entradas adquiridas. La información de esta transacción ha sido enviada al correo proporcionado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\event_assistant  $event_assistant
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
        $eventCapacity = $event->capacity;
        $eventAssistants = $event->eventAssistants->count();
        $eventAssistantsAvailable = $eventCapacity - $eventAssistants;

        $category = $event->category;
        $categoryDescription = $category->categoryDescriptions;
        return view('assistants.show', compact(
            'event',
            'category',
            'categoryDescription',
            'eventAssistantsAvailable'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\event_assistant  $event_assistant
     * @return \Illuminate\Http\Response
     */
}
