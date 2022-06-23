@extends('layouts.main', ['activePage' => 'user', 'titlePage' => 'Nuevo rol'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('user.create')}}" class="form-horizontal">
                        <input type="hidden" name="_token" value="buWVsYdyYrX8mUAfzVYmiszDfd1b5HuSBL3zuIL1"> <input type="hidden" name="_method" value="put">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Change password</h4>
                                <p class="card-category">Password</p>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-name">Nombre</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control" input="" type="text" name="name" id="name" placeholder="Current Password" value="" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-password">New Password</label>
                                    <div class="col-sm-7">
                                        <div class="form-group bmd-form-group">
                                            <input class="form-control" name="password" id="input-password" type="password" placeholder="New Password" value="" required="">
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
                           
                            <div class="row">
                            <label class="col-sm-2 col-form-label" for="input-password-confirmation">Permisos</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="profile">
                                                .<table class="table ">
                                                    <tbody>
                                                        @foreach($role as $id => $rol)
                                                        <tr>
                                                            <td>
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="checkbox" name="role[]" value="{{ $id }}">
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