@extends('layouts.main', ['activePage' => 'solicitud', 'titlePage' => __('Solicitud')])
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
      </div>
    </div>
  
      </div>

      @endsection
     