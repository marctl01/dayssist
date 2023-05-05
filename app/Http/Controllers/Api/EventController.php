<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $event = Event::create($data);
        return response()->json($event);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::find($id);
        $event->update($request->all());
        return response()->json($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::destroy($id);
        return response()->json(['message' => 'Event deleted'], 200);
    }
}
