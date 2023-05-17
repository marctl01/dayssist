<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //DEVOLVER VIEW DE DAY
        // $events = Event::all();
        // return view('user.useraction', compact('events'));
        return view('day');
    }

    public function create_form()
    {
        return view('event.create');
    }

    public function showall()
    {
        $events = Event::paginate(10);
        return view('event.showall', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //OJO MEJORAR EL VALIDATE, SOLO SALTA ERROR SI DATE ESTA MAL (mal formato de date en bbdd)
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
            'creator_id' => 'required',
            'group_id' => 'required',
        ]);

        Event::create($request->all());

        return redirect()->back()->with('success', 'Datos guardados correctamente');

        // return redirect()->route('event.showall')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event = Event::findOrFail($id);
        return view('playground', compact('event'));
    }

    public function update_form()
    {
        return view('event.update');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $id)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'finish_date' => 'required',
            'creator_id' => 'required',
            'group_id' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        // return redirect()->route('playground')->with('success', 'Event updated successfully.');
        return redirect()->back()->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Event $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        // return redirect()->route('playground')->with('success', 'Event deleted successfully.');
        return redirect()->back()->with('success', 'Event deleted successfully');
    }
}
