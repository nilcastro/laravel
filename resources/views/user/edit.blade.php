@extends('layouts.main', ['activePage' => 'user', 'titlePage' => 'Nuevo rol'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                <form method="POST" action="{{ route('user.update', $user->id) }}"  class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Editar usuarios</h4>
                                <p class="card-category">Agregar nuevos permisos</p>
                            </div>
                            <div class="card-body ">
                                @forelse($user as $use)
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-name">Nombre</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control"  type="text" name="name" id="name" placeholder="Current Password" value="{{ $use->name}}" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password">ID</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control" name="username" id="username" type="text" placeholder="New Password" value="{{ $use->username}}" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password-confirmation">Confirm New Password</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="Confirm New Password" value="" required="">
                                        </div>
                                    </div>
                                </div>  
                           @empty

                           @endforelse
                            <div class="row">
                            <label class="col-sm-2 col-form-label" for="input-password-confirmation">Permisos</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="profile">
                                                .<table class="table ">
                                                    <tbody>
                                                        @foreach($roles as $id => $rol)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" name="role[]" 
                                                                        value="{{ $id }}">
                                                                        <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $rol }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
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