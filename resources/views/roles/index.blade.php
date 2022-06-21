@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Roles'])
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
                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-facebook">Añadir permiso</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Guard</th>
                                                <th>Fecha de creación</th>
                                                <th>Permisos</th>
                                                <th class="text-rigth"></th>
                                            </thead>
                                            <tbody>
                                                @foreach($role as $rol)
                                                <tr>
                                                    <td>{{ $rol->id}}</td>
                                                    <td>{{ $rol->name}}</td>
                                                    <td>{{ $rol->guard_name}}</td>
                                                    <td>{{ $rol->created_at}}</td>
                                                    <td>
                                                        @forelse($rol->permissions as $permission)
                                                        <span class="badge badge-info">{{ $permission->name }}</span>
                                                        @empty
                                                        <span class="badge badge-danger">No tiene permisos</span>
                                                        @endforelse
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <a href="{{ route('roles.show',$rol->id) }}" class="btn btn-info">
                                                            <i class="material-icons">person</i></a>
                                                        <a href="{{ route('roles.edit',$rol->id) }}" class="btn btn-warning">
                                                            <i class="material-icons">edit</i></a>
                                                        <form action="{{ route('roles.destroy', $rol->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('seguro?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit" rel="tooltip">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    {{ $role->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
    @endsection