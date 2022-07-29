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

   
    public function show(user $user)
    {
        $user->load('roles');
        return view('user.show', compact('user'));
    }

  
    public function edit(user $user)
    {
        $roles = role::all()->pluck('name','id');
        $user->load('roles');
        //dd( $user);
        return view('user.edit', compact('user','roles'));
    }


    public function update(Request $request, user $user)
    {
    
      
         $users = $request->only('role');
      
        $user ->update($users);
         $role = $request->input('role',[]);
         //dd($role);
        $user->syncRoles($role);
       
        return redirect()->route('user.index');
    }

  
    public function destroy($id)
    {
        //
    }
}
