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
        return view('day');
    }

    public function create_form()
    {
        // $user = auth()->user()->groups;
        $groups = auth()->user()->groups;
        return view('event.create', compact('groups'));
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

        // $groupId = DB::table('group_user')
        //     ->where('user_id', $userId)
        //     ->value('group_id');

        $groupIds = DB::table('group_user')
            ->where('user_id', $userId)
            ->pluck('group_id')
            ->all();


        // $events = DB::table('events')
        //     ->whereIn('group_id', $groupIds)
        //     ->whereMonth('finish_date', '=', Carbon::parse($monthNum)->month)
        //     ->whereDay('finish_date', '=', $day)
        //     ->get();

        $events = DB::table('events')
            ->join('groups', 'events.group_id', '=', 'groups.id')
            ->whereIn('events.group_id', $groupIds)
            ->whereMonth('events.finish_date', '=', Carbon::parse($monthNum)->month)
            ->whereDay('events.finish_date', '=', $day)
            ->select('events.*', 'groups.name as group_name')
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
        $finish_date = $request->input('finish_date');
        $group_id = $request->input('group_id');


        $request->validate([
            'title' => 'required',

        ]);

        $start_date = Carbon::now();
        $creator_id = Auth::id();

        // Comprobar si algún valor es nulo
        if (empty($title) || empty($finish_date) || empty($group_id)) {
            return redirect()->back()->with('error', 'Todos los campos son obligatorios');
        }

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

        if($request->input('completed') == null){
            $event->checked = false;
        }else{
            $event->checked = true;
        }

        $finish_date = $request->input('finish_date');
        $event->finish_date = Carbon::createFromFormat('Y-m-d', $finish_date)->startOfDay();

        $event->save();

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

        return redirect()->back()->with('success', 'Event deleted successfully');
    }


}
