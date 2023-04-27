@extends('layouts.main', ['activePage' => 'especial', 'titlePage' => __('Autorización solicitud especial')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        @if(Auth::user()->username == $solicitud->jefe)
        <div class="card-header card-header-primary">
          <form action="{{ url('/especiales/jefes') }}" method="post" enctype="multipart/form-data" id="form1">
            @csrf
            <div class="card">
                  <div class="card-header card-header-primary">
              <h3 class="card-title">Revisión de Presupuesto</h3>
            </div>
              <div class="card-body">
                <table class="table table-sm">
                  <thead class="thead-ligth">
                    <tr>
                      <th scope="col">Cuenta</th>
                      <th scope="col">Descripción de la cuenta</th>
                      <th scope="col">Presupuesto disponible</th>
                    </tr>
                  </thead>
                  <tbody style="text-transform:ucwords;">
                    <tr>
                      @if($responses == null)
                      <td>
                        <h3>{{ $nada}}</h3>
                      </td>
                      @else
                      @foreach ($responses as $response)
                      <td class="table-">{{ $response['CUENTA'] }}</td>
                      <td class="table-">{{ $response['CUENTA_DESCRIPCION']}}</td>
                      <td class="table-">{{ number_format( $response['PPTO_DISPONIBLE'], 0 , ',','.' ) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  @endif
                </table>
          @elseif(Auth::user()->username == $solicitud->autoriza )
          
        <div class="card-header card-header-primary">
          <form action="{{ url('/EnvioproveeEspecial') }}" method="post" enctype="multipart/form-data" id="form1">
            @csrf
            <div class="card">
                  <div class="card-header card-header-primary">
              <h3 class="card-title">Revisión de Presupuesto</h3>
            </div>
              <div class="card-body">
                <table class="table table-sm">
                  <thead class="thead-ligth">
                    <tr>
                      <th scope="col">Cuenta</th>
                      <th scope="col">Descripción de la cuenta</th>
                      <th scope="col">Presupuesto disponible</th>
                    </tr>
                  </thead>
                  <tbody style="text-transform:ucwords;">
                    <tr>
                      @if($responses == null)
                      <td>
                        <h3>{{ $nada}}</h3>
                      </td>
                      @else
                      @foreach ($responses as $response)
                      <td class="table-">{{ $response['CUENTA'] }}</td>
                      <td class="table-">{{ $response['CUENTA_DESCRIPCION']}}</td>
                      <td class="table-">{{ number_format( $response['PPTO_DISPONIBLE'], 0 , ',','.' ) }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  @endif
                </table>
              @else
            <form action="{{ url('/autorizacion') }}" method="post" enctype="multipart/form-data" id="form1">
              @csrf
              @endif
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Información General </h4>
                </div>
                @if(count($errors)>0)
                <div class="alert alert-primary" role="alert">
                  <ul>
                    @foreach( $errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                @endif
               
            </div>
            <div class="card card-primary">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="col  mt-4">
                    <strong for="dia" class="text-primary" >Fecha de la solicitudes:</strong>
                    <input type="date" name="dia" readonly value="{{ isset($solicitud->dia)?$solicitud->dia:old('dia') }}" class="form-control" placeholder="Fecha del viaje">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="text-primary" >Breve descripción del evento o
                      actividad:</strong>
                    <input type="text" name="description" id="description" value="{{ isset($solicitud->description)?$solicitud->description:old('description') }}" class="form-control" placeholder="Indique la descripción del evento">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Duración de la actividad(Horas):</strong>
                    <input type="number" name="duracion" id="duracion" value="{{ isset($solicitud->duracion)?$solicitud->duracion:old('duracion') }}" class="form-control" placeholder="Indique el número de horas para realizar del evento ">
                  </div>
                  {{ isset($solicitud->ID_jefe)?$solicitud->ID_jefe:old('ID_jefe') }}
                  <div class="col mt-4">
                    <strong for="fechain" class="text-primary" >Fecha inicio de la activiad:</strong>
                    <input type="date" name="fechain" id="fechain" value="{{ isset($solicitud->fechain)?$solicitud->fechain:old('fechain') }}" class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>

                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Fecha fin de la actividad:</strong>
                    <input type="date" name="fechafi" id="fechafi" value="{{ isset($solicitud->fechafi)?$solicitud->fechafi:old('fechafi') }}"  class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Asistentes a la actividad:</strong>
                    <input type="text" name="asistente" id="asistente" value="{{ isset($solicitud->asistente)?$solicitud->asistente:old('asistente') }}" class="form-control" placeholder="Indique la cantidad de personas.">
                 
                
                    <strong for="dia" class="text-primary" >Asistentes a la actividad:</strong>
                    <input type="text" name="observAsistente" id="observAsistente" value="{{ isset($solicitud->observAsistente)?$solicitud->observAsistente:old('observAsistente') }}" class="form-control" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col  mt-4">
                    <strong for="dia" class="text-primary" >ID quien autoriza:</strong>
                    <input type="numbre" id="autoriza" name="autoriza" value="{{ isset($solicitud->autoriza)?$solicitud->autoriza:old('autoriza') }}" readonly class="form-control" placeholder="ID de quien autoriza">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="text-primary" >Nombre de quien autoriza:</strong>
                    <select name="nombreauto" id="nombreauto" class="form-control">
                      <option value="{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}">{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}</option><br>
                    </select>
                    <div class="col-md-12 mt-4" >
                      <label for="dia" class=" text-primary">Nombre del profesional  de gestion de proyectos:</label>
                      <option value="{{ isset($solicitud->jefenombre)?$solicitud->jefenombre:old('jefenombre') }}">{{ isset($solicitud->jefenombre)?$solicitud->jefenombre:old('jefenombre') }}</option><br>
                   
                        </select>
                    </div>
                  </div>
                  <input type="hidden" name="correoautorizadores" id="correoautorizadores" value="{{ isset($solicitud->correoautorizadores)?$solicitud->correoautorizadores:old('correoautorizadores') }}">
                  <div class="col mt-4">
                    <strong for="dia" class=" text-primary">Nombre unidad que autoriza:</strong>
                    <input type="text" name="unidadAutori" id="unidadAutori" readonly value="{{ isset($solicitud->unidadAutori)?$solicitud->unidadAutori:old('unidadAutori') }}" class="form-control" >
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Nombre de jefe que autoriza:</strong>
                    <input type="text" name="jefeautori" id="jefeautori" readonly value="{{ isset($solicitud->jefeautori)?$solicitud->jefeautori:old('jefeautori') }}" class="form-control" placeholder="Indique el nombre del jefe autorizador ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary">Centro de costos:</strong>
                    <input type="text" name="centrocosto" id="centrocosto" value="{{ isset($solicitud->centrocosto)?$solicitud->centrocosto:old('centrocosto') }}" readonly class="form-control" placeholder="Indique el centro de costos ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Correo electronico:</strong>
                    <input type="text" name="correoautori" id="correoautori" value="{{ isset($solicitud->correoautori)?$solicitud->correoautori:old('correoautori') }}" class="form-control" placeholder="Indique el correo electronico ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Solicitud realizada por:</strong>
                    <input type="text" name="nombresolici" id="nombresolici" value="{{ isset($solicitud->nombresolici)?$solicitud->nombresolici:old('nombresolici') }}" class="form-control" placeholder="Indique el nombre de la persona que solicita el servicio ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Persona que recibe:</strong>
                    <input type="text" name="recoge" id="recoge" value="{{ isset($solicitud->recoge)?$solicitud->recoge:old('recoge') }}" class="form-control" placeholder="Indique el nombre de la persona que recibe">

                    <strong for="dia" class="text-primary" >Telefono de persona que recibe:</strong>
                    <input type="text" name="telefrecibe" id="telefrecibe" value="{{ isset($solicitud->telefrecibe)?$solicitud->telefrecibe:old('telefrecibe') }}" class="form-control" placeholder="Indique el número de telefono de la persona que recibe">
                  </div>
                </div>
              </div>

              <div class=" card-body"><br>
                <div class="alert alert-primary alert-dismissible text-primary" role="alert">
                  <h4>Sobre el concesionario o proveedor</h4>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="text-primary" >Nombre del concesionario o proveedor:</strong>

                      <select class="form-control" name="Nombreprove" id="Nombreprove">                      
                        <option class="selectpicker " value="{{ isset($solicitud->Nombreprove)?$solicitud->Nombreprove:old('Nombreprove') }}"> 
                        {{ isset($solicitud->Nombreprove)?$solicitud->Nombreprove:old('Nombreprove') }}                       
                        </option>
                      </select>

                    </div><br>
                    <div class="col">
                      <strong for="correo" class="text-primary" >Correo institucional:</strong>
                      <input type="email" name="Correoelectroni" value="{{ isset($solicitud->Correoelectroni)?$solicitud->Correoelectroni:old('Correoelectroni') }}" class="form-control" id="Correoelectroni" placeholder="Digite su correo instritucional">
                    </div>
                    <div class="col">
                      <strong for="correo" class="text-primary" >Teléfono:</strong>
                      <input type="text" name="Teléfono" value="{{ isset($solicitud->Teléfono)?$solicitud->Teléfono:old('Teléfono') }}" class="form-control" id="Teléfono" placeholder="Digite su teléfono">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="text-primary" >Nombre de contacto 1:</strong>
                      <input type="text" name="nombrecontactouno" id="nombrecontactouno" value="{{ isset($solicitud->nombrecontactouno)?$solicitud->nombrecontactouno:old('nombrecontactouno') }}" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                    </div><br>
                    <div class="col">
                      <strong for="Cargo" class="text-primary" >Teléfono de contacto 1:</strong>
                      <input type="text" name="telefonouno" value="{{ isset($solicitud->telefonouno)?$solicitud->telefonouno:old('telefonouno') }}" id="telefonouno" class="form-control" placeholder="Digite su cargo" aria-label="Cargo">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="text-primary" >Nombre de contacto 2:</strong>
                      <input type="text" name="nombrecontactodos" id="nombrecontactodos" class="form-control" value="{{ isset($solicitud->nombrecontactodos)?$solicitud->nombrecontactodos:old('nombrecontactodos') }}" aria-label="Nombre completo">
                    </div><br>
                    <div class="col">
                      <strong for="Cargo" class="text-primary" >Teléfono de contacto 2:</strong>
                      <input type="text" name="telefonodos" id="telefonodos" class="form-control" value="{{ isset($solicitud->telefonodos)?$solicitud->telefonodos:old('telefonodos') }}">
                    </div>
                    <p type="" name="id" id="id"  value="{{ isset($solicitud->id)?$solicitud->id:old('id') }}"></p>
                  </div>

                </div>
                <hr>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title ">Solicitud del servicio de alimentación y bebidas
                      </h4>
                    </div>
                    <div class="card-body">
                      <div class="row ml-1">
                        <div class="col-md-2">
                          <strong class=" text-primary" for="fecha" class="form-label">Fecha</strong>
                          <input type="date" name="fechasoliciuno" id="fechasoliciuno" value="{{ isset($solicitud->fechasoliciuno)?$solicitud->fechasoliciuno:old('fechasoliciuno') }}" class="form-control" class="form-control" aria-label="Cargo">
                        </div>
                        <div class="col-md-2">
                          <strong class=" text-primary" for="hora" class="form-label">Hora</strong>
                          <input type="time" name="horauno" id="horauno" value="{{ isset($solicitud->horauno)?$solicitud->horauno:old('horauno') }}" class="form-control" aria-label="Cargo">
                        </div>
                        <div class="col-md-3">
                          <strong class=" text-primary" for="lugar" class="form-label">Lugar</strong>
                          <input type="text" name="lugaruno" id="lugaruno" value="{{ isset($solicitud->lugaruno)?$solicitud->lugaruno:old('lugaruno') }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <strong class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</strong>
                          <input class="form-control" type="text" id="persrecibe" name="persrecibe" value="{{ isset($solicitud->persrecibe)?$solicitud->persrecibe:old('persrecibe') }}">
                        </div>
                      </div> 
                      <div class="row ml-1">
                        <div class="col-md-4">
                          <strong class=" text-primary" for="producto" class="form-label">Producto a entregar</strong>
                          <select type="text" name="producto" id="producto"   class="form-control">
                            <option value="{{ isset($solicitud->producto)?$solicitud->producto:old('producto') }}">{{ isset($solicitud->producto)?$solicitud->producto:old('producto') }}
                            </option>
                          </select>
                        </div>
                        <div class="col-md-2">
                    {{--     <div class="col-md-2">
                        @if(Auth::user()->username == $solicitud->username)
                          <strong class=" text-primary" for="Cantidad" class="form-label">Cantidad</strong>
                          <input type="number" name="cantidad" id="cantidad" readOnly value="{{ isset($solicitud->cantidad)?$solicitud->cantidad:old('cantidad') }}" class="form-control">
                          </div>
                        <div class="col-md-2">
                          <strong class=" text-primary" for="hora" class="form-label">Valor unitario</strong>
                          <input type="number" name="valorunid" id="valorunid"readOnly value="{{ isset($solicitud->valorunid)?$solicitud->valorunid:old('valorunid') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                          <strong class=" text-primary" for="lugar" class="form-label">Valor total</strong>
                          <input type="number" name="valortota" id="valortota"readOnly value="{{ isset($solicitud->valortota)?$solicitud->valortota:old('valortota') }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <strong class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</strong>
                          <input class="form-control" type="text" id="persrecibe"readOnly name="persrecibe" value="{{ isset($solicitud->persrecibe)?$solicitud->persrecibe:old('persrecibe') }}">
                        </div>
                        @else --}}
                          <strong class=" text-primary" for="Cantidad" class="form-label">Cantidad</strong>
                          <input type="number" name="cantidad" id="cantidad" readOnly value="{{ isset($solicitud->cantidad)?$solicitud->cantidad:old('cantidad') }}" class="form-control">
                        </div>
                        <div class="col-md-2">
                          <strong class=" text-primary" for="hora" class="form-label">Valor unitario</strong>
                          <input type="number" name="valorunid" id="valorunid" value="{{ isset($solicitud->valorunid)?$solicitud->valorunid:old('valorunid') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                          <strong class=" text-primary" for="lugar" class="form-label">Valor total</strong>
                          <input type="number" name="valortota" id="valortota" value="{{ isset($solicitud->valortota)?$solicitud->valortota:old('valortota') }}" class="form-control">
                        </div>
                       
                      </div>
                        {{-- @endif --}}
                        
  
                      <hr>
                      <!-- .................................................................................................................. -->
                      <div class="container" id="encuestser" style="display: ;">
                        <div class="row">
                          <div class="col-md-2">
                            <strong class=" text-primary" for="fecha" class="form-label">Fecha</strong>
                            <input type="date" name="fechasolicidos" id="fechasolicidos" value="{{ isset($solicitud->fechasolicidos)?$solicitud->fechasolicidos:old('fechasolicidos') }}" class="form-control" class="form-control" aria-label="Cargo">
                          </div>
                          <div class="col-md-2">
                            <strong class=" text-primary" for="hora" class="form-label">Hora</strong>
                            <input type="time" name="horados" id="horados" value="{{ isset($solicitud->horados)?$solicitud->horados:old('horados') }}" class="form-control" aria-label="Cargo">
                          </div>
                          <div class="col-md-3">
                            <strong class=" text-primary" for="lugar" class="form-label">Lugar</strong>
                            <input type="text" name="lugardos" id="lugardos" value="{{ isset($solicitud->lugardos)?$solicitud->lugardos:old('lugardos') }}" class="form-control">
                          </div>
                          <div class="col-md-4">
                            <strong class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</strong>
                            <input class="form-control" type="text" id="persrecibedos" name="persrecibedos" value="{{ isset($solicitud->persrecibedos)?$solicitud->persrecibedos:old('persrecibedos') }}">
                          </div>
                        </div>
                       
                        <div class="row mb-4">
                          <div class="col-md-4">
                            <strong class=" text-primary" for="producto" class="form-label">Producto a entregar</strong>
                            <select type="text" name="productodos" id="productodos" value="{{ isset($solicitud->productodos)?$solicitud->productodos:old('productodos') }}" class="form-control">
                
                              <option value="{{ isset($solicitud->productodos)?$solicitud->productodos:old('productodos') }}">
                                    {{ isset($solicitud->productodos)?$solicitud->productodos:old('productodos') }}
                              </option>
                             
                            </select>
                          </div>
                          <div class="col-md-2">
                            <strong class=" text-primary" for="Cantidad" class="form-label">Cantidad</strong>
                            <input type="number" name="cantidaddos" id="cantidaddos" value="{{ isset($solicitud->cantidaddos)?$solicitud->cantidaddos:old('cantidaddos') }}" class="form-control">
                          </div>
                          <div class="col-md-2">
                            <strong class=" text-primary" for="hora" class="form-label">Valor unitario</strong>
                            <input type="number" name="valoruniddos" id="valoruniddos" value="{{ isset($solicitud->valoruniddos)?$solicitud->valoruniddos:old('valoruniddos') }}" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <strong class=" text-primary" for="lugar" class="form-label">Valor total</strong>
                            <input type="number" name="valortotados" id="valortotados" value="{{ isset($solicitud->valortotados)?$solicitud->valortotados:old('valortotados') }}" class="form-control">
                          </div>
                          
                          <hr>
                        </div>
                     
                      {{-- ACA EMPIEZA --}}
                           {{-- producto tres----- --}}
                           <hr>
                      
                           <hr>
                           <div class="row mt-4">
                             <div class="col-md-2">
                               <label class=" text-primary" for="fecha" class="form-label">Fecha de entrega</label>
                               <input type="date" name="fechasolicitres" id="fechasolicitres" value="{{ isset($solicitud->fechasolicitres)?$solicitud->fechasolicitres:old('fechasolicitres') }}" class="form-control" min=<?php $hoy = date("Y-m-d");
                                    echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                             </div>
                             <div class="col-md-2">
                                 <label class=" text-primary" for="hora" class="form-label">Hora</label>horatres
                                 <input type="time" name="horatres" id="horatres" value="{{ isset($solicitud->horatres)?$solicitud->horatres:old('horatres') }}" class="form-control" aria-label="Cargo">
                             </div>
                             <div class="col-md-3">
                                 <label class=" text-primary" for="lugar" class="form-label">Lugar</label>
                                 <input type="text" name="lugartres" id="lugartres"  value="{{ isset($solicitud->lugartres)?$solicitud->lugartres:old('lugartres') }}" class="form-control">
                             </div>
                             <div class="col-md-4">
                               <label class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</label>
                               <input class="form-control" type="text" id="persrecibetres" name="persrecibetres"  value="{{ isset($solicitud->persrecibetres)?$solicitud->fechasolicitres:old('persrecibetres') }}">
                             </div>
                           </div>
                     
                           <div class="row  mt-4" >
                             <div class="col-md-4">
                               <label class=" text-primary" for="productotres" class="form-label">Producto a entregar</label>
                               <select type="text" name="productotres" id="productotres"  value="{{ isset($solicitud->productotres)?$solicitud->productotres:old('productotres') }}" class="form-control">
                                    <option value="{{ isset($solicitud->productotres)?$solicitud->productotres:old('productotres') }}">
                                      {{ isset($solicitud->productotres)?$solicitud->productotres:old('productotres') }}
                                    </option>
                               </select>                      
                           </div>
                             <div class="col-md-2">
                               <label class=" text-primary" for="Cantidad" class="form-label">Cantidad</label>
                               <input type="number" name="cantidatres" id="cantidatres"  value="{{ isset($solicitud->cantidatres)?$solicitud->cantidatres:old('cantidatres') }}" class="form-control">
                             </div>
                             <div class="col-md-2">
                               <label class=" text-primary" for="hora" class="form-label">Valor unitario</label>
                               <input type="number" name="valorunidtres" id="valorunidtres"  value="{{ isset($solicitud->valorunidtres)?$solicitud->valorunidtres:old('valorunidtres') }}" class="form-control">
                             </div>
                             <div class="col-md-3">
                               <label class=" text-primary" for="lugar" class="form-label">Subtotal</label>
                               <input type="number" name="valortotatres" id="valortotatres"  value="{{ isset($solicitud->valortotatres)?$solicitud->valortotatres:old('valortotatres') }}" class="form-control">
                             </div>
                            
                           </div>
                           {{-- ----------cuatroproductos------------------------ --}}
                           <hr>
                           <hr>
                           <div class="row mt-4">
                             <div class="col-md-2">
                               <label class=" text-primary" for="fecha" class="form-label">Fecha de entrega</label>
                               <input type="date" name="fechasolicicuatro" id="fechasolicicuatro"  value="{{ isset($solicitud->fechasolicicuatro)?$solicitud->fechasolicicuatro:old('fechasolicicuatro') }}" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                                               echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                             </div>
                             <div class="col-md-2">
                                 <label class=" text-primary" for="hora" class="form-label">Hora</label>
                                 <input type="time" name="horacuatro" id="horacuatro"  value="{{ isset($solicitud->horacuatro)?$solicitud->horacuatro:old('horacuatro') }}" class="form-control" aria-label="Cargo">
                             </div>
                             <div class="col-md-3">
                                 <label class=" text-primary" for="lugar" class="form-label">Lugar</label>
                                 <input type="text" name="lugarcuatro" id="lugarcuatro"  value="{{ isset($solicitud->lugarcuatro)?$solicitud->lugarcuatro:old('lugarcuatro') }}" class="form-control">
                             </div>
                             <div class="col-md-4">
                               <label class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</label>
                               <input class="form-control" type="text" id="persrecibecuatro" name="persrecibecuatro"  value="{{ isset($solicitud->persrecibecuatro)?$solicitud->persrecibecuatro:old('persrecibecuatro') }}">
                             </div>
                           </div>
                     
                           <div class="row  mt-4" >
                             <div class="col-md-4">
                               <label class=" text-primary" for="productodos" class="form-label">Producto a entregar</label>
                               <select type="text" name="productocuatro" id="productocuatro"  value="{{ isset($solicitud->productocuatro)?$solicitud->productocuatro:old('productocuatro') }}" class="form-control">
                                      <option value="{{ isset($solicitud->productocuatro)?$solicitud->productocuatro:old('productocuatro') }}">
                                        {{ isset($solicitud->productocuatro)?$solicitud->productocuatro:old('productocuatro') }}
                                      </option>
                               </select>                      
                           </div>
                           <div class="col-md-2">
                             <label class=" text-primary" for="Cantidad" class="form-label">Cantidad</label>
                             <input type="number" name="cantidadcuatro" id="cantidadcuatro"  value="{{ isset($solicitud->cantidadcuatro)?$solicitud->cantidadcuatro:old('cantidadcuatro') }}" class="form-control">
                           </div>
                           <div class="col-md-2">
                             <label class=" text-primary" for="hora" class="form-label">Valor unitario</label>
                             <input type="number" name="valorunidcuatro" id="valorunidcuatro"  value="{{ isset($solicitud->valorunidcuatro)?$solicitud->valorunidcuatro:old('valorunidcuatro') }}" class="form-control">
                           </div>
                           <div class="col-md-3">
                             <label class=" text-primary" for="lugar" class="form-label">Subtotal</label>
                             <input type="number" name="valortotacuatro" id="valortotacuatro"  value="{{ isset($solicitud->valortotacuatro)?$solicitud->valortotacuatro:old('valortotacuatro') }}" class="form-control">
                           </div>
               
                         </div>
                         {{-- -----------cinco  productos------------------------ --}}
                         <hr>
                         <hr>
                           <div class="row mt-4">
                             <div class="col-md-2">
                               <label class=" text-primary" for="fecha" class="form-label">Fecha de entrega</label>
                               <input type="date" name="fechasolicicinco" id="fechasolicicinco"  value="{{ isset($solicitud->fechasolicicinco)?$solicitud->fechasolicicinco:old('fechasolicicinco') }}" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                                               echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                             </div>
                             <div class="col-md-2">
                                 <label class=" text-primary" for="hora" class="form-label">Hora</label>
                                 <input type="time" name="horacinco" id="horacinco"  value="{{ isset($solicitud->horacinco)?$solicitud->horacinco:old('horacinco') }}" class="form-control" aria-label="Cargo">
                             </div>
                             <div class="col-md-3">
                                 <label class=" text-primary" for="lugar" class="form-label">Lugar</label>
                                 <input type="text" name="lugarcinco" id="lugarcinco"  value="{{ isset($solicitud->lugarcinco)?$solicitud->lugarcinco:old('lugarcinco') }}" class="form-control">
                             </div>
                             <div class="col-md-4">
                               <label class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</label>
                               <input class="form-control" type="text" id="persrecibecinco" name="persrecibecinco"  value="{{ isset($solicitud->persrecibecinco)?$solicitud->persrecibecinco:old('persrecibecinco') }}">
                             </div>
                           </div>
                     
                           <div class="row  mt-4" >
                             <div class="col-md-4">
                               <label class=" text-primary" for="productodos" class="form-label">Producto a entregar</label>
                               <select type="text" name="productocinco" id="productocinco"  value="{{ isset($solicitud->productocinco)?$solicitud->productocinco:old('productocinco') }}" class="form-control">
                                        <option value="{{ isset($solicitud->productocinco)?$solicitud->productocinco:old('productocinco') }}">
                                          {{ isset($solicitud->productocinco)?$solicitud->productocinco:old('productocinco') }}
                                        </option>
                               </select>                      
                           </div>
                           <div class="col-md-2">
                             <label class=" text-primary" for="Cantidad" class="form-label">Cantidad</label>
                             <input type="number" name="cantidadcinco" id="cantidadcinco"  value="{{ isset($solicitud->cantidadcinco)?$solicitud->cantidadcinco:old('cantidadcinco') }}" class="form-control">
                           </div>
                           <div class="col-md-2">
                             <label class=" text-primary" for="hora" class="form-label">Valor unitario</label>
                             <input type="number" name="valorunidcinco" id="valorunidcinco"  value="{{ isset($solicitud->valorunidcinco)?$solicitud->valorunidcinco:old('valorunidcinco') }}" class="form-control">
                           </div>
                           <div class="col-md-3">
                             <label class=" text-primary" for="lugar" class="form-label">Subtotal</label>
                             <input type="number" name="valortotacinco" id="valortotacinco"  value="{{ isset($solicitud->valortotacinco)?$solicitud->valortotacinco:old('valortotacinco') }}" class="form-control">
                           </div>
                                
                         </div>
                         <div class="row mt-4 ml-2"  >
                         <div class="col-md-6">
                           <label class=" text-primary" for="lugar" class="form-label">Valor total de la factura:</label>
                           <input type="number" name="valortotalfinal" id="valortotalfinal"  value="{{ isset($solicitud->valortotalfinal)?$solicitud->valortotalfinal:old('valortotalfinal') }}" class="form-control">
                         </div>
                              
                       </div>
                       {{-- -----------fin productos------------------------ --}}
                     </div>
                        {{-- ACA TERMINA  --}}
                      <hr>
                      <div class="col-md-3 ml-4 mt-4">
                        <div class="row">
                          <strong class=" text-primary" for="recibe" class="form-label">¿Desea pedir mas de un producto?</strong>
                          <div class="form-check form-check-radio">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="mas" id="mas" value="SI" checked>SI
                              <span class="circle">
                                <span class="check"></span>
                              </span>
                            </label>
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="mas" id="mas" value="NO" >NO
                              <span class="circle">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                          <br>
                          <div class="col-md-12 mt-4">
                            <div class="row">
                            @if(Auth::user()->username == $solicitud->jefe)
                              <h3 class="text-primary" for="recibe" class="form-label">Por favor acepte o rechace la solicitud.</h3>
                           
                              <select name="estado" id="estado" required class="form-control text-danger">
                                
                                <option  value="{{ isset($solicitud->estado)?$solicitud->estado:old('estado') }}">{{ isset($solicitud->estado)?$solicitud->estado:old('estado') }}</option>
                             
                                <option class="text-success" value="Aceptada">Aceptar</option>
                                <option value="Rechazada">Rechazar</option>


                            @elseif(Auth::user()->username == $solicitud->autoriza)
                                <strong class="text-primary" for="recibe" class="form-label">Estado de la solicitud.</strong>
                           
                                <select name="estado" id="estado" class="form-control">
                                <option value="{{ isset($solicitud->estado)?$solicitud->estado:old('estado') }}">{{ isset($solicitud->estado)?$solicitud->estado:old('estado') }}</option>
                                <option value="Envio a proveedor">Envio a proveedor</option>
                                <option value="Rechazar">Rechazar</option>
                            @else
                           
                                <strong class="text-primary" for="recibe" class="form-label">Estado de la solicitud.</strong>
                           
                                <select name="estado" id="estado" class="form-control">
                                <option value="{{ isset($solicitud->estado)?$solicitud->estado:old('estado') }}">{{ isset($solicitud->estado)?$solicitud->estado:old('estado') }}</option>
                            
                            @endif
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                <input type="hidden" name="jefe" id="jefe" value="{{ isset($solicitud->jefe)?$solicitud->jefe:old('jefe') }}">
                <input type="hidden" name="email" id="email" value="{{ isset($solicitud->email)?$solicitud->email:old('email') }}">
                <input type="hidden" name="jefenombre" id="jefenombre" value="{{ isset($solicitud->jefenombre)?$solicitud->jefenombre:old('jefenombre') }}">
                <input type="hidden" name="id" id="id" value="{{ isset($solicitud->id)?$solicitud->id:old('id') }}">
                

                <div class="row">
                @if(Auth::user()->username == $solicitud->autoriza)
                @if( $solicitud->estado == 'Aceptada')
                  <div class="col-md-2 mr-4">
                    <button class="btn btn-success" type="submit" >Enviar a proveedor</button>
                  </div>
                  @endif
                  <div class="col-md-2 ml-4"> 
                    <a href="{{ url('solicitud/') }}" class="btn btn-primary">Regresar</a>
                  </div>
                
                @elseif(Auth::user()->username == $solicitud->username)
                @if( $solicitud->estado == 'Envio a proveedor')
                <div class="col-md-2">
                    <button class="btn btn-success" id="pendientess"   type="submit" disabled>Aceptada</button>
                  </div>
                  @endif
                  <div class="col-md-2 ml-4"> 
                    <a href="{{ url('solicitud/') }}" class="btn btn-primary">Regresar</a>
                  </div>
                 
                @else
                @if( $solicitud->estado == 'Envio a proveedor')
                <div class="col-md-2">
                    <button class="btn btn-success" type="submit" disabled>Aceptada</button>
                    
                  </div>
                  @elseif($solicitud->estado == 'Pendiente')
                  <div class="col-md-2">
                  <button class="btn btn-success" type="submit" >Aceptada</button>
                    
                  </div>
                
                  @endif
                  <div class="col-md-2 ml-4"> 
                    <a href="{{ url('solicitud/') }}" class="btn btn-primary">Regresar</a>
                  </div>
                
                  @endif
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
     
      @endsection
      @section('js')
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
      <!-- <script src="{{ asset('js/main/eventos.js') }}"></script> -->
      @endsection
      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="{{ asset('js/main/eventos.js') }}"></script>
      <script src="{{ asset('js/main/profesional.js') }}"></script>
      <script>
        $(document).ready(function() {

          // alert("hola");
          $("#mas").on('change', function() {
            var bueno = $("#mas").val();
            console.log(bueno);

            element = document.getElementById("encuestser");
            if (bueno == 'SI') {
              element.style.display = 'block';
            } else if (bueno == 'NO') {
              console.log("hola");
              element.style.display = 'none';
            }
          });
        });

        $(document).ready(function() {

          // alert("hola");
          $("#mas").on('change', function() {
            var bueno = $("#mas").val();
            console.log(bueno);

            element = document.getElementById("encuestser");
            if (bueno == 'SI') {
              element.style.display = 'block';
            } else if (bueno == 'NO') {
              console.log("hola");
              element.style.display = 'none';
            }


          });
        });

        $(document).ready(function() {
          // alert("hola");
          $("#nombreauto").on('change', function() {
            var si = $("#nombreauto").val();
            console.log(si);
            var url = $(this).attr('action')
            $.ajax({
              url: "{{ route('ajax.consulta')}}",
              type: 'POST',
              data: $("#form1").serialize(),
            }).done(function(res) {
              $jefe = res[0].nombre_jefe + res[0].apellido_jefe
              // alert($jefe)
              document.getElementById("autoriza").value = res[0].username;
              document.getElementById("jefeautori").value = $jefe;
              document.getElementById("centrocosto").value = res[0].programa;
            })
          });

        });


        $(document).ready(function() {

          //alert("hola");
          $("#Nombreprove").on('change', function() {
            let s = $("#Nombreprove").val();
   
            var url = $(this).attr('action')
            $.ajax({
              url: "{{ route('ajax.register')}}",
              type: 'POST',
              data: $("#form1").serialize(),
              success: function(res) {
                //console.log(res[0]);
                document.getElementById("id").value = res[0].id;
                document.getElementById("Correoelectroni").value = res[0].correoProvee;
                document.getElementById("Teléfono").value = res[0].telProvee;
                document.getElementById("nombrecontactouno").value = res[0].nombreContac;
                document.getElementById("telefonouno").value = res[0].telProvee;
                document.getElementById("nombrecontactodos").value = res[0].nombrecontactodos;
                document.getElementById("telefonodos").value = res[0].telefonodos;
              }
            })
          });
        });

        $(document).ready(function() {

          //alert("hola");
          $("#producto").on('click', function() {
            // let s = $("#producto").val();
            let p = $("#Nombreprove").val();
             console.log(p);
            var url = $(this).attr('action')
            $.ajax({
              url: "{{ route('ajax.product')}}",
              type: 'POST',
              data: p,
              success: function(res) {
                console.log(res[0]);
                document.getElementById("id").value = res[0].id;
                document.getElementById("Correoelectroni").value = res[0].correoProvee;
                document.getElementById("Teléfono").value = res[0].telProvee;
                document.getElementById("nombrecontactouno").value = res[0].nombreContac;
                document.getElementById("telefonouno").value = res[0].telProvee;
                document.getElementById("nombrecontactodos").value = res[0].nombrecontactodos;
                document.getElementById("telefonodos").value = res[0].telefonodos;
              }
            })
          });
        });


        $(document).ready(function() {
          $("#cantidad").on('change', function() {
            var s = $("#cantidad").val();
            //console.log(s);
            let canti = document.getElementById("cantidad").value;
            let precio = document.getElementById("valorunid").value;
            document.getElementById("valortota").value = canti * precio;

          });

        });

        $(document).ready(function() {

          //alert("hola");
          $("#producto1").on('change', function() {
            var s = $("#producto1").val();
            //alert("hola");
            console.log(s);
            var url = $(this).attr('action')
            $.ajax({
              url: "{{ route('ajax.product')}}",
              type: 'POST',
              data: $("#form1").serialize(),
              success: function(res) {
                $hola = res[0].precio;
                console.log($hola)
                document.getElementById("valorunid").value = $hola;
              }
            })
          });

        });

        $(document).ready(function() {
          $("#cantidad").on('change', function() {
            var s = $("#cantidad").val();
            //console.log(s);
            let canti = document.getElementById("cantidad").value;
            let precio = document.getElementById("valorunid").value;
            document.getElementById("valortota").value = canti * precio;

          });

        });
      </script>