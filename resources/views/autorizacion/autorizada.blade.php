@extends('layouts.main', ['activePage' => 'Autorizacion.incex', 'titlePage' => __('Autorizacion')])
@section('content')
<div class="content">
    <div class="container-fluid">
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
                                       
                                        <th>Autoriza</th>
                                        <th>Solicitante </th>
                                        <th>Duración </th>
                                        <th>Lugar </th>
                                        <th>Proveedor</th>
                                        <th>Fecha del evento</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($solicitud as $solicitu)
                                    <tr>
                                        <td>{{ $solicitu->nombreauto}}</td>
                                        <td>{{ $solicitu->nombresolici}}</td>
                                        <td>{{ $solicitu->duracion}}</td>
                                        <td>{{ $solicitu->lugaruno}}</td>
                                        <td>{{ $solicitu->Nombreprove}}</td>
                                        <td class="text-primary">{{ $solicitu->fechain}}</td>
                                        <td><a href="{{ url('/ Envioprovee/'.$solicitu->id.'/edit') }}" class="btn btn-warning">{{ $solicitu->estado }}</a></td>
                                        <td></td>
                                    
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