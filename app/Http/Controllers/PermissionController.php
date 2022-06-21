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
        $permission = $permission->all();
     //dd($permission);
        return view('permissions.edit', compact('permission'));
    }


    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->only('name'));

        return redirect()->route('permission.index');
    }

    
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index');
    }
}
