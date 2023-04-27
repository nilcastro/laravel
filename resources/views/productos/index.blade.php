@extends('layouts.main', ['activePage' => 'productos', 'titlePage' => __('Productos')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Crear nuevo producto
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Formulario nuevo producto.</h4>
                        <button type="button" class="close" data-dismiss="modal"onclick="location.reload()" aria-label="Close">
                            <span arial-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/productos/create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 form-group">

                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nombre producto</label>
                                    <input type="text" class="form-control" name="nombreProduc" id="nombreProduc" aria-describedby="emailHelp">

                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="exampleCheck1">Descripción del producto</label>
                                    <input type="text" class="form-control" name="descrProduc" id="descrProduc">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form" for="exampleCheck1">Precio por unidad </label>
                                    <input type="number" class="form-control" name="precio" id="precio">
                                </div>

                                <div class="form-group mb-3 ">
                                    <label class="form-control" for="nombre">Nombre proveedor</label>
                                    <select name="nombreProvee" id="nombreProvee" class="form-control">
                                    <option value="">Selecciona proveedor</option>
                                        @foreach($proveedores as $proveedor)
                                      
                                        <option value="{{$proveedor->nombreProvee}}">{{$proveedor->nombreProvee}}</option>
                                       
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"onclick="location.reload()" data-dismiss="modal">Cerrar</button>
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

                                        <th>Nombre producto</th>
                                        <th>Descripción producto </th>
                                        <th>Precio </th>
                                        <th>Nombre Proveedor</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($productos as $producto)
                                     
                                        <td>{{$producto->nombreProduc}}</td>
                                        <td>{{$producto->descrProduc}}</td>
                                        <td>{{$producto->precio}}</td>
                                        <td>{{$producto->nombreProvee}}</td>
                                        <td> <button type="button" class="btn btn-primary btn-link btn-sm"  data-toggle="modal" data-target="#editarinfo{{$producto->id}}">
                                             <i class="material-icons">edit</i>
                                            </button>
                                            
                                            <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro desea eliminar este articulo? despues de eliminado no se puede recuperar ')">
                                                @csrf
                                                @method('DELETE')
                                                <!-- <button  class="btn btn-danger btn-link btn-sm"  type="submit" rel="tooltip">
                                                    <i class="material-icons">close</i>
                                                </button> -->
                                                <button class="btn btn-danger  btn-link btn-sm" onclick='swal({ title:"Eliminado", text: "registro no se vuelve a recuperar!", type: "success", buttonsStyling: false, confirmButtonClass: "btn btn-success"})'>  <i class="material-icons">close</i></button>
                                            </form>

                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editarinfo{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Formulario editar producto</h4>
                                                    <button type="button" class="close" data-dismiss="modal"onclick="location.reload()" aria-label="Close">
                                                        <span arial-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ url('/productos/update,$producto->id') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="mb-3 form-group">
                                                        <input type="hidden"  name="id" id="id" value="{{$producto->id}}" aria-describedby="emailHelp">
                                                            <div class="form-group mb-3">
                                                                <label for="exampleInputEmail1" class="form-label">Nombre producto</label>
                                                                <input type="text" class="form-control" name="nombreProduc" id="nombreProduc" value="{{ isset($producto->nombreProduc)?$producto->nombreProduc:old('nombreProduc')}}" aria-describedby="emailHelp">

                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="form-label" for="exampleCheck1">Descripcion del producto</label>
                                                                <input type="text" class="form-control" name="descrProduc" value="{{ isset($producto->descrProduc)?$producto->descrProduc:old('descrProduc')}}" id="descrProduc">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="form" for="exampleCheck1">Precio por unidad </label>
                                                                <input type="text" class="form-control" name="precio" id="precio" value="{{ isset($producto->precio)?$producto->precio:old('precio')}}">
                                                            </div>

                                                            <input type="hidden"  name="id_provee" id="id_provee" value="{{isset($producto->proveedores->id)?$producto->proveedores->id:old('id')}}" aria-describedby="emailHelp">

                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"onclick="location.reload()" data-dismiss="modal">Cerrar</button>
                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">{!! $productos->links() !!}</div> 
                    </div>
                </div>
            </div>
            @endsection