@extends('layouts.main', ['activePage' => 'reportess', 'titlePage' => __('Reportes de solicitudes')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Reportes de solicitudes</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body card-body-primary">
                            <a class="btn btn-info" href="{{ route('reporte') }}">Generar reporte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/main/eventos.js') }}"></script>
    @endsection
