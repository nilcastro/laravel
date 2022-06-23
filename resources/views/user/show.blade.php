@extends('layouts.main', ['activePage' => 'user', 'titlePage' => 'vista de usuarios'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                       <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Usuarios</h4>
                                <p class="card-category">vista detallada de cada usuario</p>
                            </div>
                            <div class="card-body ">
                                @if(session('success'))
                                <div class="alert alert-success" roller="success">
                                    {{ session('success') }}
                                </div>
                                @endif
                               <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-user">
                                            <div class="card-body">
                                               <table class="table table-bordered table-stried">
                                                   <tbody>
                                                       <tr>
                                                           <th>ID</th>
                                                           <td>{{ $user->id}}</td>

                                                       </tr>
                                                       <tr>
                                                           <th>Name</th>
                                                           <td>{{ $user->name }}</td>
                                                       </tr>
                                                       <tr>
                                                           <th>email</th>
                                                           <td>{{ $user->email }}</td>
                                                       </tr>
                                                       <tr>
                                                           <th>Name</th>
                                                           <td>{{ $user->name }}</td>
                                                       </tr>
                                                       <tr>
                                                           <th>Roles</th>
                                                           <td>
                                                           @forelse ($user->roles as $role)  
                                                                <span class="badge badge-info">{{  $role->name }}</span> 
                                                            @empty
                                                                <span class="badge badge-info">Sin rol</span>
                                                            @endforelse
                                                        </td>
                                                       </tr>
                                                   </tbody>

                                               </table>
                                            </div>

                                        </div>
                                    </div>
                               </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">Change password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>

    @endsection