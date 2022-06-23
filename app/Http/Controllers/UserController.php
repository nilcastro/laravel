<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\Component;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;
use Spatie\Permission\Models\Role;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::paginate(5);
        return view('user.index', compact('users'));
    }

 
    public function create()
    {
        
        $role = Role::all()->pluck('name','id');
        return view ('user.create', Compact('role'));
    }


    public function store(Request $request)
    {
        //dd('hola');
        $user = User::create($request->only('name', 'email' )
        +[
            'password' => bcrypt($request->input('password')),
        ]);
        $role =$request->input('role',[]);
        $user->syncRoles($role);
        return redirect()->route('user.show', $user->id)->with('success', 'usuario registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $user->load('roles');
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $roles = role::all()->pluck('name','id');
        $user->load('roles');

        return view('user.edit', compact('user','roles'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
