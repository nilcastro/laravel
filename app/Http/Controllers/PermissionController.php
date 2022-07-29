<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
 
    public function index()
    {
        $permissions = Permission::paginate(5);
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $permissions = Permission::all()->pluck('name', 'id');
        
        return view('permissions.create');
    }

    
    public function store(Request $request)
    {   
        $campos=[
            'name'=>'required|string|max:100',
           ];
           $mensaje=[
               'required'=>'El campo :attribute es requerido',
               'name.required'=>'El nombre del permiso es requerido', 
           ];
           $this->validate($request,$campos,$mensaje);        
     //dd($request);
        Permission::create($request->only('name'));

        return redirect()->route('permissions.index');
    }

   
    public function show(Permission $permission)
    {
        return view('permissions.show', compact('permission'));
    }

 
    public function edit(permission $permission)
    {
        

        // $permission = $permission->all();
        //dd($permission);
        return view('permissions.edit', compact('permission'));
    }


    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->only('name'));

        return redirect()->route('permissions.index');
    }

    
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index');
    }
}
