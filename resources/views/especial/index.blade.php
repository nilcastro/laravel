@extends('layouts.main', ['activePage' => 'Especial', 'titlePage' => __('Especial')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Sericio de solicitud de refrigerios</h4>
          </div>
          <br><br>
          <div class="row mb-4">
          <div class="col-5 ml-4">
            <a class="btn btn-info" href="{{ url('solicitud/create') }}">Crear nueva solicutd de refrigerios y bebidas</a>
          </div>
          <div class="col-5 mr-2">
            <a class="btn btn-success" href="{{ url('/solicitud/create') }}">Consultar proveedores de refrigerios y bebidas</a>

          </div>
          </div>
         
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de solicitudes</h4>
                        <p class="card-category"> todas las solicitudes </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <tr>
                                      <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Autoriza</th>
                                        <th>Solicitante </th>
                                        <th>Duración </th>
                                        <th>Lugar </th>
                                        <th>Proveedor</th>
                                        <th>Fecha evento</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($solicitud as $solicitu)
                                    <tr>
                                      <td >{{ $solicitu->id}}</td>
                                        <td>{{ $solicitu->dia}}</td>
                                        <td>{{ $solicitu->nombreauto}}</td>
                                        <td>{{ $solicitu->nombresolici}}</td>
                                        <td>{{ $solicitu->duracion}}</td>
                                        <td>{{ $solicitu->lugaruno}}</td>
                                        <td>{{ $solicitu->Nombreprove}}</td>
                                        <td class="text-primary">{{ $solicitu->fechain}}</td>
                                        <td>{{ $solicitu->estado}}</td>
                                        <td><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-warning">Revisar </a></td>
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


  

      @endsection
     