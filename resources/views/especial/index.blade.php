@extends('layouts.main', ['activePage' => 'Especial', 'titlePage' => __('Solicitud especial ')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 ">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Sericio de solicitud de refrigerios</h4>
          </div>
          <br><br>
          <div class="row mb-4 container-fluid">
            <div class="col-6 ml-4">
              <a class="btn btn-info" href="{{ url('especial/create') }}">Crear nueva solicutd de refrigerios y bebidas</a>
            </div>
            {{-- <div class="col-5 mr-2 container-fluid">
              <a class="btn btn-success" href="{{ url('/solicitud/create') }}">Consultar proveedores de refrigerios y bebidas</a>
            </div> --}}
          </div>
         
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card col-md-12 mb-4">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de solicitudes</h4>
                        <p class="card-category"> todas las solicitudes </p>
                    </div>
                    {{-- buscador y modal --}}
                    <div class="col-8 mt-4">
                        <div class="input-group">
                            <input type="text" class="form-control  text-primary" id="texto" placeholder="Buscar por proveedor, solicitante, fecha o persona que autoriza ">
                            <a class="btn btn-success ml-2"data-toggle="modal" data-target=".modal-xl" placeholder="Buscar"  id="btnserch">Buscar</a>
                        </div>                       
                    </div>
                    {{-- <button type="button" class="btn btn-primary" >Large modal</button> --}}
                    <div class="modal modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel">Resultado de busqueda</h5>
                            <button type="button" class="close" data-dismiss="modal"onclick="location.reload()" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <table class="table">
                              <thead class="text-primary">
                                  <tr>
                                      <th>Autoriza</th>
                                      <th>Solicitante </th>
                                      <th>Horas</th>
                                      <th>Lugar</th>
                                      <th>Proveedor</th>
                                      <th>Producto</th>
                                      <th>Cantidad</th>
                                      <th>Total</th>
                                      <th>Fecha evento</th>
                                      <th>Estado</th>
                                  </tr>
                              </thead>
                              <tbody id="resultados">
                              </tbody>
                            </table>   
                          </div>
                          <div class="modal-footer">
                            <button type="button"onclick="location.reload()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{--finaliza modal  --}}
                    <div class="card-body">
                        <div class="table-responsive xl">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>Autoriza</th>
                                        <th>Solicitante </th>
                                        <th>Horas</th>
                                        <th>Lugar</th>
                                        <th>Proveedor</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                        <th>Fecha evento</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach($solicitud as $solicitu)
                                    @if(Auth::user()->username == $solicitu->autoriza )
                                    <tr>
                                     
                                        <td>{{ $solicitu->nombreauto}}</td>
                                        <td>{{ $solicitu->nombresolici}}</td>
                                        <td>{{ $solicitu->duracion}}</td>
                                        <td>{{ $solicitu->lugaruno}}</td>
                                        <td>{{ $solicitu->Nombreprove}}</td>
                                        <td>{{ $solicitu->producto}}</td>
                                        <td>{{ $solicitu->cantidad}}</td>
                                        <td>{{ $solicitu->valortota}}</td>
                                        <td class="text-primary">{{ $solicitu->fechain}}</td>
                                        @if( $solicitu->estado == "Pendiente" )
                                        <td  class="text-danger"><a href="{{ route('especiales.edit',$solicitu->id) }}" class="btn btn-danger" >{{ $solicitu->estado}}</td>
                     
                                        @elseif($solicitu->estado == "Aceptada")
                                        <td  class="text-"><a href="{{ route('especiales.edit',$solicitu->id) }}" class="btn btn-warning">{{ $solicitu->estado}}</td>
                                        @elseif($solicitu->estado == "Envio a proveedor")
                                         <td  class="text-"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-success">{{ $solicitu->estado}}</td>
                                        @else
                                        <td  class="text-"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-dark">{{ $solicitu->estado}}</td>
                                       
                                         @endif
                                    </tr>
                                    @elseif(Auth::user()->username == $solicitu->jefe )
                                    <tr>
                                        <td>{{ $solicitu->nombreauto}}</td>
                                        <td>{{ $solicitu->nombresolici}}</td>
                                        <td>{{ $solicitu->duracion}}</td>
                                        <td>{{ $solicitu->lugaruno}}</td>
                                        <td>{{ $solicitu->Nombreprove}}</td>
                                        <td>{{ $solicitu->producto}}</td>
                                        <td>{{ $solicitu->cantidad}}</td>
                                        <td>{{ $solicitu->valortota}}</td>
                                        <td class="text-primary">{{ $solicitu->fechain}}</td>
                                        @if( $solicitu->estado == "Pendiente" )
                                       <td  class="text-danger"><a href="{{ route('especiales.edit',$solicitu->id) }}" class="btn btn-danger" >{{ $solicitu->estado}}</td>
                    
                                       @elseif($solicitu->estado == "Aceptada")
                                       <td  class="text-"><a href="{{ route('especiales.edit',$solicitu->id) }}" class="btn btn-warning">{{ $solicitu->estado}}</td>
                                       @elseif($solicitu->estado == "Envio a proveedor")
                                        <td  class="text-"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-success">{{ $solicitu->estado}}</td>
                                       @else
                                       <td  class="text-"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-dark">{{ $solicitu->estado}}</td>
                                      
                                        @endif
                                      
                                    </tr>
                                    
                                    @elseif(Auth::user()->username == $solicitu->username )
                                    <tr>
                                        <td>{{ $solicitu->nombreauto}}</td>
                                        <td>{{ $solicitu->nombresolici}}</td>
                                        <td>{{ $solicitu->duracion}}</td>
                                        <td>{{ $solicitu->lugaruno}}</td>
                                        <td>{{ $solicitu->Nombreprove}}</td>
                                        <td>{{ $solicitu->producto}}</td>
                                        <td>{{ $solicitu->cantidad}}</td>
                                        <td>{{ $solicitu->valortota}}</td>
                                        <td class="text-primary">{{ $solicitu->fechain}}</td>
                                        @if( $solicitu->estado == "Pendiente" )
                                       <td  class="text-danger"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-danger" disabled>{{ $solicitu->estado}}</td>
                    
                                       @elseif($solicitu->estado == "Aceptada")
                                       <td  class="text-"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-warning">{{ $solicitu->estado}}</td>
                                       @else <td  class="text-"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-success">{{ $solicitu->estado}}</td>
                                       @endif
                                    
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody> 
                            </table>     
                                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/buscador.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ asset('js/main/eventos.js') }}"></script> --}}
   
    @endsection
  
 