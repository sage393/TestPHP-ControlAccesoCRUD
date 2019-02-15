<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = null;
        
        try {
            $users = User::paginate(10);
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
        
        return view('users.indexUser')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = null;
        $user = null;
        
        try {
            $user = new User();
            
            if (Auth::user()->hasRole('admin')) {
                $roles = Role::all();
            } else {
                $roles = Role::where('slug', 'guest')->get();
            }
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
        
        return view('users.createUser')->with([
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('create')) {
            return redirect()->route('users.index')->with('warning', 'No tienes permisos para crear nuevos registros');
        }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role' => 'integer'
        ]);
        
        $user = null;
        
        try {
            $user = new User([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password'))
            ]);
            
            $user->save();
            $user->roles()->attach($request->get('role')); 
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('users.show', ['user' => $user])->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = null;
        
        try {
            $user = User::find($id);
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
        
        return view('users.detailUser')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = null;
        $user = null;
        
        try {
            $user = User::find($id);
            
            if (Auth::user()->hasRole('admin')) {
                $roles = Role::all();
            } else {
                $roles = Role::where('slug', 'guest')->get();
            }
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
        
        return view('users.editUser')->with(['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::user()->can('edit')) {
            return redirect()->route('users.index')->with('warning', 'No tienes permisos para editar registros');
        }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'role' => 'integer'
        ]);
        
        $user = null;
        
        try {
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->roles()->detach();
            $user->save();
            $user->roles()->attach($request->get('role')); 
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }   
        
        return redirect()->route('users.show', ['user' => $user])->with('success', 'Registro editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->can('delete')) {
            return redirect()->route('users.index')->with('warning', 'No tienes permisos para eliminar registros');
        }
        
        $user = null;
        
        try {
            $user = User::find($id);
            $user->delete();
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('users.index')->with('success', 'Registro eliminado exitosamente');
    }
}
