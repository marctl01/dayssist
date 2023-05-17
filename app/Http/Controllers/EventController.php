<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

    public function showDayEvent($month, $day)
    {
        $monthMappings = [
            'Enero' => 'January',
            'Febrero' => 'February',
            'Marzo' => 'March',
            'Abril' => 'April',
            'Mayo' => 'May',
            'Junio' => 'June',
            'Julio' => 'July',
            'Agosto' => 'August',
            'Septiembre' => 'September',
            'Octubre' => 'October',
            'Noviembre' => 'November',
            'Diciembre' => 'December',
        ];

        $month = $monthMappings[$month];
        $day = $day;

        $events = DB::table('events')
            ->whereMonth('start_date', '=', Carbon::parse($month)->month)
            ->whereDay('start_date', '=', $day)
            ->get();

        dd($events);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
            'creator_id' => 'required',
            'group_id' => 'required',
        ]);

        Event::create($request->all());

        return redirect()->back()->with('success', 'Datos guardados correctamente');

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

        return redirect()->back()->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Event $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully');
    }
}
