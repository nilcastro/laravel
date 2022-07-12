@extends('layouts.main', ['activePage' => 'autorizacion', 'titlePage' => __('Autorizacion')])
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
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">solicitudes de refrigerios</h4>
          </div>
          <br><br>
          <div class="row mb-4">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ url('/solicitud') }}" method="post" enctype="multipart/form-data" id="form1">
          @csrf
         
            @if(count($errors)>0)
            <div class="alert alert-primary" role="alert">
              <ul>
                @foreach( $errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          
            <div class="card card-primary">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">Fecha de la solicitud:</strong>
                    <input type="date" name="dia" readonly value="{{ isset($solicitud->dia)?$solicitud->dia:old('dia') }}" class="form-control" placeholder="Fecha del viaje">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">Breve descripción del evento o actividad:</strong>
                    <input type="text" name="description" id="description" value="{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}" class="form-control" placeholder="Indique la descripción del evento">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Duración de la actividad(Horas):</strong>
                    <input type="number" name="duracion" id="duracion" value="{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}" class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>
                  <!-- //  <input type="range"from ="2019-01-01" to="2019-02-14"> -->
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Fecha inicio de la activiad:</strong>
                    <input type="date" name="fechain" id="fechain" value="{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}" min=<?php $hoy = date("Y-m-d");
                                                                                echo $hoy; ?> max="2030-09-15" class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>

                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Fecha fin de la actividad:</strong>
                    <input type="date" name="fechafi" id="fechafi" value="{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}" min=<?php $hoy = date("Y-m-d");
                                                                                echo $hoy; ?> max="2030-09-15" class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Asistentes a la actividad:</strong>
                    <input type="number" name="asistente" id="asistente" value="{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}" class="form-control" placeholder="Indique la cantidad de personas.">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">ID quien autoriza:</strong>
                    <p id="autoriza" name="autoriza" value="{{ isset($solicitud->autoriza)?$solicitud->autoriza:old('autoriza') }}" readonly class="form-control" >{{ isset($solicitud->autoriza)?$solicitud->autoriza:old('autoriza') }}</p>
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">Nombre de quien autoriza:</strong>
                    <select name="nombreauto" id="nombreauto" class="form-control">
                      <option value="{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}">{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}</option>
                    
                    </select>
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Nombre de jefe que autoriza:</strong>
                    <input type="text" name="jefeautori" id="jefeautori" readonly value="{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}" class="form-control" placeholder="Indique el nombre del jefe autorizador ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Centro de costos:</strong>
                    <input type="text" name="centrocosto" id="centrocosto" value="{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}" readonly class="form-control" placeholder="Indique el centro de costos ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Correo electronico:</strong>
                    <input type="text" name="correoautori" id="correoautori" value="{{ Auth::user()->email }}" class="form-control" placeholder="Indique el correo electronico ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Solicitud realizada por:</strong>
                    <input type="text" name="nombresolici" id="nombresolici" value="{{ Auth::user()->name }}{{ Auth::user()->apellidos }}" class="form-control" placeholder="Indique el nombre de la persona que solicita el servicio ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Persona que recibe:</strong>
                    <input type="text" name="recibe" id="recibe" value="{{ isset($solicitud->recibe)?$solicitud->recibe:old('recibe') }}" class="form-control" placeholder="Indique el nombre de la persona que recibe.">
                  </div>
                </div>
              </div>

              <div class=" card-body"><br>
                <div class="alert alert-primary alert-dismissible" role="alert">
                  <h4>Sobre el concesionario o proveedor</h4>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="form-label">Nombre del concesionario o proveedor:</strong>
                      <select name="Correoelectroni" id="Nombreprove" class="form-control" class="Nombreprove">
                
                        <option value="{{ isset($solicitud->nombreProvee)?$solicitud->nombreProvee:old('nombreProvee') }}">{{ isset($solicitud->nombreProvee)?$solicitud->nombreProvee:old('nombreProvee') }}</option>
                        
                      </select>

                    </div>
                    <div class="col">
                      <strong for="correo" class="form-label">Correo institucional:</strong>
                      <input type="email" name="Correoelectroni" value="{{ isset($solicitud->Correoelectroni)?$solicitud->Correoelectroni:old('Correoelectroni') }}" class="form-control" id="Correoelectroni" placeholder="Digite su correo instritucional">
                    </div>
                    <div class="col">
                      <strong for="correo" class="form-label">Teléfono:</strong>
                      <input type="text" name="Teléfono" value="{{ isset($solicitud->Teléfono)?$solicitud->Teléfono:old('Teléfono') }}" class="form-control" id="Teléfono" placeholder="Digite su teléfono">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="form-label">Nombre de contacto 1:</strong>
                      <input type="text" name="nombrecontactouno" id="nombrecontactouno" value="{{ isset($solicitud->nombrecontactouno)?$solicitud->nombrecontactouno:old('nombrecontactouno') }}" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                    </div>
                    <div class="col">
                      <strong for="Cargo" class="form-label">Teléfono de contacto 1:</strong>
                      <input type="text" name="telefonouno" value="{{ isset($solicitud->telefonouno)?$solicitud->telefonouno:old('telefonouno') }}" id="telefonouno" class="form-control" placeholder="Digite su cargo" aria-label="Cargo">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="form-label">Nombre de contacto 2:</strong>
                      <input type="text" name="nombrecontactodos" id="" value="{{ isset($solicitud->nombrecontactodos)?$solicitud->nombrecontactodos:old('nombrecontactodos') }}" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                    </div>
                    <div class="col">
                      <strong for="Cargo" class="form-label">Teléfono de contacto 2:</strong>
                      <input type="text" name="telefonodos" value="{{ isset($solicitud->telefonodos)?$solicitud->telefonodos:old('telefonodos') }}" class="form-control" placeholder="Digite su cargo" aria-label="Cargo">
                    </div>
                  </div>

                </div>
                <hr>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title ">Solicitud del servicio de alimentación y bebidas</h4>

                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead class=" text-primary">
                            <tr>
                              <th>Fecha</th>
                              <th>Hora</th>
                              <th>Lugar</th>
                              <th>Producto a entregar</th>
                            </tr>

                          </thead>
                          <tbody>
                            <tr>
                              <td> <input type="date" name="fechasoliciuno" value="{{ isset($solicitud->fechasoliciuno)?$solicitud->fechasoliciuno:old('fechasoliciuno') }}" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                              echo $hoy; ?> max="2030-09-15" aria-label="Cargo">
                              </td>
                              <td>
                                <input type="time" name="horauno" value="{{ isset($solicitud->horauno)?$solicitud->horauno:old('horauno') }}" class="form-control" aria-label="Cargo">
                              </td>
                              <td> <input type="text" name="lugaruno" id="lugaruno"></td>
                              <td><select type="text" name="producto" id="producto" class="form-control">
                             
                              
                                  <option value="{{ isset($solicitud->producto)?$solicitud->producto:old('producto') }}">{{ isset($solicitud->producto)?$solicitud->producto:old('producto') }}</option>
                                
                                </select>
                              </td>
                            </tr>
                            <thead class=" text-primary">
                              <tr>
                                <th>Cantidad</th>
                                <th>Valor unitario</th>
                                <th>Valor total</th>
                                <th>Recibe a satisfacción</th>
                              </tr>
                            </thead>
                            <tr>
                            <td class="text-primary"><input type="number" name="cantidad" id="cantidad"></td>
                              <td><input type="number" name="valorunid" id="valorunid">{{ isset($solicitud->valorunid)?$solicitud->valorunid:old('valorunid') }}</td>
                              <td><input type="number" name="valortota" id="valortota">{{ isset($solicitud->valortota)?$solicitud->valortota:old('valortota') }}</td>
                              <td><input type="text" name="recibe" id="">{{ isset($solicitud->recibe)?$solicitud->recibe:old('recibe') }}</td>
                          </tbody>
                        </table>
                      </div>
                      <hr><br>
                      <div class="table-responsive">
                        <table class="table">
                          <thead class=" text-primary">
                            <tr>
                              <th>Fecha</th>
                              <th>Hora</th>
                              <th>Lugar</th>
                              <th>Producto a entregar</th>
                            </tr>

                          </thead>
                          <tbody>
                            <tr>
                              <td> <input type="date" name="fechasoliciuno" value="{{ isset($solicitud->fechasoliciuno)?$solicitud->fechasoliciuno:old('fechasoliciuno') }}" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                              echo $hoy; ?> max="2030-09-15" aria-label="Cargo">
                              </td>
                              <td>
                                <input type="time" name="horauno" value="{{ isset($solicitud->horauno)?$solicitud->horauno:old('horauno') }}" class="form-control" aria-label="Cargo">
                              </td>
                              <td> <input type="text" name="lugaruno" id="lugaruno">{{ isset($solicitud->lugaruno)?$solicitud->lugaruno:old('lugaruno') }}</td>
                              <td><select type="text" name="producto" id="producto" class="form-control">
                                 
                                  <option value="{{ isset($solicitud->producto)?$solicitud->producto:old('producto') }}">{{ isset($solicitud->producto)?$solicitud->producto:old('producto') }}</option>
                                
                                </select>
                              </td>
                            </tr>
                            <thead class=" text-primary">
                              <tr>
                                <th>Cantidad</th>
                                <th>Valor unitario</th>
                                <th>Valor total</th>
                                <th>Recibe a satisfacción</th>
                              </tr>
                            </thead>
                            <tr>
                            <td class="text-primary"><input type="number" name="cantidad" id="cantidad"></td>
                              <td><input type="number" name="valorunid" id="valorunid">{{ isset($solicitud->valorunid)?$solicitud->valorunid:old('valorunid') }}</td>
                              <td><input type="number" name="valortota" id="valortota">{{ isset($solicitud->valortota)?$solicitud->valortota:old('valortota') }}</td>
                              <td><input type="text" name="recibe" id="">{{ isset($solicitud->recibe)?$solicitud->recibe:old('recibe') }}</td>
                          </tbody>
                        </table>
                      </div>
                      <hr><br>
                      <div class="table-responsive">
                        <table class="table">
                          <thead class=" text-primary">
                            <tr>
                              <th>Fecha</th>
                              <th>Hora</th>
                              <th>Lugar</th>
                              <th>Producto a entregar</th>
                            </tr>

                          </thead>
                          <tbody>
                            <tr>
                              <td> <input type="date" name="fechasoliciuno" value="{{ isset($solicitud->fechasoliciuno)?$solicitud->fechasoliciuno:old('fechasoliciuno') }}" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                              echo $hoy; ?> max="2030-09-15" aria-label="Cargo">
                              </td>
                              <td>
                                <input type="time" name="horauno" value="" class="form-control" aria-label="Cargo">
                              </td>
                              <td> <input type="text" name="lugaruno" id="lugaruno">{{ isset($solicitud->lugaruno)?$solicitud->lugaruno:old('lugaruno') }}</td>
                              <td><select type="text" name="producto" id="producto" class="form-control">
                              <option value="{{ isset($solicitud->producto)?$solicitud->producto:old('producto') }}">{{ isset($solicitud->producto)?$solicitud->producto:old('producto') }}</option>
                                
                                </select>
                              </td>
                            </tr>
                            <thead class=" text-primary">
                              <tr>
                                <th>Cantidad</th>
                                <th>Valor unitario</th>
                                <th>Valor total</th>
                                <th>Recibe a satisfacción</th>
                              </tr>
                            </thead>
                            <tr>
                              <td class="text-primary"><input type="number" name="cantidad" id="cantidad"></td>
                              <td><input type="number" name="valorunid" id="valorunid">{{ isset($solicitud->valorunid)?$solicitud->valorunid:old('valorunid') }}</td>
                              <td><input type="number" name="valortota" id="valortota">{{ isset($solicitud->valortota)?$solicitud->valortota:old('valortota') }}</td>
                              <td><input type="text" name="recibe" id="">{{ isset($solicitud->recibe)?$solicitud->recibe:old('recibe') }}</td>
                          </tbody>
                        </table>
                      </div>
                      <hr><br>
                    </div>
                  </div>
                </div>
                <div>
                  <input class="form-control" type="hidden" id="estado" name="estado" value="Pendiente">
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <button class="btn btn-success" type="submit">Enviar Solicitud</button>
                  </div> <br>
                  <div class="col"> <a href="{{ url('solicitud/') }}" class="btn btn-primary">Regresar</a></div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

      @endsection
     