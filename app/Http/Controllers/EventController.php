<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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

        $monthNum = $monthMappings[$month];
        $day = $day;

        $userId = Auth::id();

        $groupId = DB::table('group_user')
            ->where('user_id', $userId)
            ->value('group_id');

        $events = DB::table('events')
            ->where('group_id', $groupId)
            ->whereMonth('finish_date', '=', Carbon::parse($monthNum)->month)
            ->whereDay('finish_date', '=', $day)
            ->get();

        foreach ($events as $event) {
            $event->finish_date = Carbon::parse($event->finish_date)->format('Y-m-d');
        }

        return view('day', compact('events', 'month', 'day'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');


        $request->validate([
            'title' => 'required',

        ]);

        $start_date = Carbon::now();
        $finish_date = Carbon::now();
        $creator_id = Auth::id();

        $group_id = DB::table('group_user')
            ->where('user_id', $creator_id)
            ->value('group_id');

        Event::create([
            'title' => $title,
            'description' => $description,
            'start_date' => $start_date,
            'finish_date' => $finish_date,
            'creator_id' => $creator_id,
            'group_id' => $group_id,
        ]);

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
    public function update(Request $request, $id)
    {


        $event = Event::findOrFail($id);
        // $event->update($request->all());
        $event->title = $request->input('title');
        $event->description = $request->input('description');

        $finish_date = $request->input('finish_date');
        $event->finish_date = Carbon::createFromFormat('Y-m-d', $finish_date)->startOfDay();

        $event->save();

        // return redirect()->route('playground')->with('success', 'Event updated successfully.');
        return redirect()->back()->with('success', 'Event updated successfully');
    }

    public function showDayEventDelete($month, $day)
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

        $monthNum = $monthMappings[$month];
        $day = $day;

        $events = DB::table('events')
            ->whereMonth('start_date', '=', Carbon::parse($monthNum)->month)
            ->whereDay('start_date', '=', $day)
            ->get();

        return view('event.delete', compact('events', 'month', 'day'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        // return redirect()->route('playground')->with('success', 'Event deleted successfully.');
        return redirect()->back()->with('success', 'Event deleted successfully');
    }


}
