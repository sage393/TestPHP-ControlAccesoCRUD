<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = null;
        
        try {
            $roles = Role::paginate(10);
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
        
        return view('roles.indexRole')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = null;
        $permissions = null;
        
        try {
            $role = new Role();
            $permissions = Permission::all();
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
        
        return view('roles.createRole')->with([
            'role' => $role,
            'permissions' => $permissions,
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
            return redirect()->route('roles.index')->with('warning', 'No tienes permisos para crear nuevos registros');
        }
        
        $request->validate([
            'slug' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $role = null;
        
        try {
            $role = new Role([
                'slug' => $request->get('slug'),
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]);
            
            $role->save();
            $role->permissions()->attach($request->get('permissions'));
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('roles.show', ['role' => $role])->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = null;
        
        try {
            $role = Role::find($id);
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
        
        return view('roles.detailRole')->with('role', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = null;
        $permissions = null;
        
        try {
            $role = Role::find($id);
            $permissions = Permission::all();
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
        
        return view('roles.editRole')->with([
            'role' => $role,
            'permissions' => $permissions,
        ]);
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
            return redirect()->route('roles.index')->with('warning', 'No tienes permisos para editar registros');
        }
        
        $request->validate([
            'slug' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $role = null;
        
        try {
            $role = Role::find($id);
            $role->slug = $request->get('slug');
            $role->name = $request->get('name');
            $role->description = $request->get('description');            
            $role->save();
            $role->permissions()->detach();
            $role->permissions()->attach($request->get('permissions'));
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('roles.show', ['role' => $role])->with('success', 'Registro editado exitosamente');
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
            return redirect()->route('roles.index')->with('warning', 'No tienes permisos para eliminar registros');
        }
        
        $role = null;
        
        try {
            $role = Role::find($id);
            $role->delete();
        } catch (\Exception $e) {
            return redirect()->route('roles.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('roles.index')->with('success', 'Registro eliminado exitosamente');
    }
}
