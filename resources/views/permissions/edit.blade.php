@extends('layouts.main', ['activePage' => 'permissions', 'titlePage' => 'Editar permiso'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('permissions.update', $permission->id) }}" method="post" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Permisos </h4>
                            <p class="card-category">Editar datos </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="name" class="col-sm-12 col-fomr-label"> Nombre del permiso </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $permission->name)}}">
                                </div>
                            </div>
                            @if ($errors->has('name'))
                            <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>
@endsection