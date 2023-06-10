<?php

namespace App\Http\Controllers\Coordinador;

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
        return view('coordinador.group', compact('groups'));
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


    // protected function create_group(Request $request)
    // {
    //     $group = Group::find($request->input('group_id'));
    //     $pass = $request->input('password');
    //     $passConfirm = $request->input('password_confirm');
    //     $user = auth()->user();

    //     if ($group != null) {
    //         if ($user->groups->contains($group->id)) {
    //             return redirect()->back()->with('error', 'El grupo ya está adjunto.');
    //         }
    //         if ($pass === $passConfirm) {
    //             if (Hash::check($pass, $group->password)) {
    //                 $user->groups()->attach($group);
    //                 return redirect()->back()->with('success', 'Añadido al nuevo grupo exitosamente.');
    //             } else {
    //                 return redirect()->back()->with('error', 'Contraseña incorrecta.');
    //             }
    //         } else {
    //             return redirect()->back()->with('error', 'Las contraseñas no coinciden.');
    //         }
    //     } else {
    //         // Si el grupo no existe, muestra un mensaje de error
    //         return redirect()->back()->with('error', 'El Grupo no existe.');
    //     }
    // }

    protected function create_group(Request $request)
    {
        $groupName = $request->input('name');
        $groupPassword = $request->input('password');
        $groupPasswordConfirm = $request->input('password_confirm');
        $user = auth()->user();

        // Verificar si el grupo ya existe
        $existingGroup = Group::where('name', $groupName)->first();

        if ($existingGroup) {
            // El grupo ya existe
                return redirect()->back()->with('error', 'El grupo ya existe.');
        } else {
            if ($groupPassword === $groupPasswordConfirm) {
                // El grupo no existe, crearlo
                $newGroup = new Group();
                $newGroup->name = $groupName;
                $newGroup->password = Hash::make($groupPassword);
                $newGroup->save();

                // Adjuntar al usuario actual al nuevo grupo
                $user->groups()->attach($newGroup);

                return redirect()->back()->with('success', 'Grupo creado y usuario añadido exitosamente.');
            } else {
                return redirect()->back()->with('error', 'Las contraseñas no coinciden.');
            }
        }
    }



    protected function add_group(Request $request)
    {
        $group = Group::find($request->input('group_id'));
        $pass = $request->input('password');
        $user = auth()->user();

        if ($group != null) {
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
