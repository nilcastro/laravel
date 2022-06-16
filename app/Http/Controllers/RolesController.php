<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        Role::create($request->only('name'));

        return redirect()->route('roles.index');
    }

    
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact($role));
  
    }
   

    public function update(Request $request, Role $role)
    {
        $role->update($request->only('name'));

        return redirect()->route('roles.index', compact($role));
  
    }

   
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
 
    }
  
   
      
}
