<?php

namespace App\Http\Controllers\Miembro;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GroupController extends Controller
{
    public function index()
    {
        $groups = auth()->user()->groups;
        return view('miembro.group', compact('groups'));
    }


    protected function delete(Request $request)
    {
        $group = Group::find($request->input('group'));
        $user = User::find($request->input('user'));

        if (!$group) {
            return redirect()->back()->with('error', 'El Grupo no existe.');
        }

        $group->users()->detach($user->id);
        return redirect()->back()->with('success', 'Usuario eliminado exitosamente.');
    }

    protected function add_group(Request $request)
    {
        $group = Group::find($request->input('group_id'));
        $pass = $request->input('password');
        $user = auth()->user();
    
        if($group != null){
            if ($user->groups->contains($group->id)) {
                return redirect()->back()->with('error', 'El grupo ya está adjunto.');
            }
            if (Hash::check($pass, $group->password)) {
                $user->groups()->attach($group);
                return redirect()->back()->with('success', ' Añadido al nuevo grupo exitosamente.');
            }
        }
    
        return redirect()->back()->with('error', 'El Grupo no existe.');
    }
    
}
