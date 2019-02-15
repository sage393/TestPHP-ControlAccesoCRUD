<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = null;
        
        try {
            $permissions = Permission::paginate(10);
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with('error', $e->getMessage());
        }
        
        return view('permissions.indexPermission')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = null;
        
        try {
            $permission = new Permission();
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with('error', $e->getMessage());
        }
        
        return view('permissions.createPermission')->with('permission', $permission);
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
            return redirect()->route('permissions.index')->with('warning', 'No tienes permisos para crear nuevos registros');
        }
        
        $request->validate([
            'slug' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $permission = null;
        
        try {
            $permission = new Permission([
                'slug' => $request->get('slug'),
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]);
            
            $permission->save();
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('permissions.show', ['permission' => $permission])->with('success', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = null;
        
        try {
            $permission = Permission::find($id);
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with('error', $e->getMessage());
        }
        
        return view('permissions.detailPermission')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = null;
        
        try {
            $permission = Permission::find($id);
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with('error', $e->getMessage());
        }
        
        return view('permissions.editPermission')->with('permission', $permission);
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
            return redirect()->route('permissions.index')->with('warning', 'No tienes permisos para editar registros');
        }
        
        $request->validate([
            'slug' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);
        
        $permission = null;
        
        try {
            $permission = Permission::find($id);
            $permission->slug = $request->get('slug');
            $permission->name = $request->get('name');
            $permission->description = $request->get('description');
            $permission->save();
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('permissions.show', ['permission' => $permission])->with('success', 'Registro editado exitosamente');
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
            return redirect()->route('permissions.index')->with('warning', 'No tienes permisos para eliminar registros');
        }
        
        $permission = null;
        
        try {
            $permission = Permission::find($id);
            $permission->delete();
        } catch (\Exception $e) {
            return redirect()->route('permissios.index')->with('error', $e->getMessage());
        }
        
        return redirect()->route('permissions.index')->with('success', 'Registro eliminado exitosamente');
    }
}
