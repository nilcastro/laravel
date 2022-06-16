@extends('layouts.main', ['activePage' => 'proveedores', 'titlePage' => __('Proveedores')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Crear nuevo proveedor 
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Formulario nuevo proveedor</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span arial-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ url('/proveedores/create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3 form-check">
     
                            <div class="mb-3">
                                <label for="nombreProvee" class="form-label">Nombre proveedor</label>
                                <input type="text" class="form-control" name="nombreProvee"id="nombreProvee" aria-describedby="emailHelp">
                            
                            </div>
                            <div class="mb-3">
                                <label class="form" for="exampleCheck1">Correo Proveedor</label>
                                <input type="text" class="form-control"name="correoProvee" id="correoProvee">
                            </div>
                            <div class="mb-3">
                                <label class="form" for="exampleCheck1">Nombre contacto</label>
                                <input type="text" class="form-control"name="nombreContac" id="nombreContac">
                            </div>
                           
                            <div class="mb-3 ">
                                <label class="form" for="exampleCheck1">Teléfono celular</label>
                                <input type="text" class="form-control"name="telProvee" id="telProvee">
                               
                            </div>
                           
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row ">
            <div class="card">
                <div class="col-md-12">

                    <div class="card card-plain">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title mt-0"> Listado de proveedores</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="">
                                        <tr>
                                            <th>Nombre proveedor</th>
                                            <th>Correo electronico</th>
                                            <th>Nombre de contacto </th>
                                            <th>Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        @foreach($proveedores as $producto) 
                                       
                                            <td>{{ $producto->nombreProvee }}</td>
                                         
                                            <td>{{$producto->correoProvee}}</td>
                                            <td>{{$producto->nombreContac}}</td>
                                            <td>{{$producto->telProvee}}</td>
                                            
                                        </tr>

                                       @endforeach 
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection