<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rols = Rol::all();
        return response()->json($rols);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rol = Rol::create($data);
        return response()->json($rol);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rol = Rol::find($id);
        return response()->json($rol);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rol = Rol::find($id);
        $rol->update($request->all());
        return response()->json($rol);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rol::destroy($id);
        return response()->json(['message' => 'Rol deleted'], 200);
    }
}
