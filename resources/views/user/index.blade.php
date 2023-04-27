@extends('layouts.main', ['activePage' => 'user', 'titlePage' => 'Usuarios'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Roles </h4>
                                <p class="card-category">roles registrados </p>
                            </div>
                            <div class="card-body ">
                                <div class="card-body">
                                    {{-- <-- <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-facebook">Añadir permiso</a>
                                        </div>
                                    </div> --> --}}
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <!-- <th>Fecha de creación</th> -->
                                                <th>Rol</th>
                                                <!-- <th>Permisos</th> -->
                                                <th class="text-rigth"></th>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->username}}</td>
                                                    <td>{{ $user->name}}{{ $user->apellidos}}</td>
                                                   {{-- <td>{{ $user->created_at}}</td> --> --}}
                                                    <td>
                                                        @forelse($user->roles as $role)
                                                            <span class="badge badge-info">{{  $role->name }}</span>
                                                        @empty 
                                                            <span class="badge badge-danger">No tiene permisos</span>
                                                        @endforelse
                                                    </td>
                                                     {{-- <td>
                                                        @forelse($user->permissions as $permission)
                                                        <span class="badge badge-info">{{ $permission->name }}</span>
                                                        @empty
                                                        <span class="badge badge-danger">No tiene permisos</span>
                                                        @endforelse
                                                    </td>  --}}
                                                    <td class="td-actions text-right">
                                                        <a href="{{ route('user.show',$user->id) }}" class="btn btn-info">
                                                            <i class="material-icons">person</i></a>
                                                        <a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning">
                                                            <i class="material-icons">edit</i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    @endsection