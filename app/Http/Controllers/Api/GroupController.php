<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return response()->json($groups);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $group = Group::create($data);
        return response()->json($group);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $group = Group::find($id);
        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $group = Group::find($id);
        $group->update($request->all());
        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Group::destroy($id);
        return response()->json(['message' => 'Group deleted'], 200);
    }
}
