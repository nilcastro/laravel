<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::paginate(5);
        return view('roles.index', compact('role'));
    }

 
    public function create()
    {
        $permissions = Permission::all()->pluck('name', 'id');
        //dd($permissions);
        return view('roles.create',compact('permissions'));
    }

    public function store(Request $request)
    {
       $role = Role::create($request->only('name'));
       
       $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    
    public function show(Role $role)
    {
        $role->load('permissions');
        return view('roles.show', compact('role'));
 
    }

   
    public function edit(Role $role)
    {
        $permissions = Permission::all()->pluck('name','id');
        // paa caragr por medio de la relacion los permisos 
        $role->load('permissions');
        //dd($permissions);
        return view('roles.edit', compact('role','permissions'));
  
    }
   

    public function update(Request $request, Role $role)
    {
        $role->update($request->only('name'));
        $role->permissions()->sync( $request->input('permissions', []));

        return redirect()->route('roles.index' );
  
    }

   
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
 
    }
  
   
      
}
