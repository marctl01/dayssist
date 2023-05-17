<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);
        return view('admin.user' , compact('users'));
    }

    public function index_searcher(Request $request)
    {
        $nombreABuscar = $request->input('search');
        
        $users = User::where('name', 'like', "%$nombreABuscar%")
                ->paginate(20);
        return view('admin.user' , compact('users'));
    }

    public function update()
    {
        return view('admin.User.update');
    }

    public function update_searcher(Request $request)
    {
        $nombreABuscar = $request->input('search');
        
        $users = User::where('name', 'like', "%$nombreABuscar%")
                ->paginate(20);
        return view('admin.User.update' , compact('users'));
    }

    public function view_form_create()
    {
        return view('admin.User.create');
    }
    public function view_form_delete()
    {
        return view('admin.User.delete');
    }

    protected function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'rol_id' => 'required|in:1,2',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors()->all())->withInput();
        }

        $user =  User::create([
            'name' =>  $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'remember_token' => Str::random(10),
            'role_id' => $request->input('rol_id'),
        ]);

        $user->remember_token = Str::random(10);

        if ($user->save()) {
            return redirect()->back()->with('success', 'Usuario creado exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Error al crear el usuario.');
        }
    }

    protected function delete(Request $request)
    {
        $user = User::find($request->input('id'));

        if (!$user) {
            return redirect()->back()->with('error', 'El usuario no existe.');
        }

        User::destroy($user->id);
        return redirect()->back()->with('success', 'Usuario eliminado exitosamente.');
    }


}
