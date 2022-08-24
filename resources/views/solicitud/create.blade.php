@extends('layouts.main', ['activePage' => 'solicitud', 'titlePage' => __('Solicitud')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ url('/solicitud') }}" method="post" enctype="multipart/form-data" id="form1">
          @csrf
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Información general </h4>
            </div>
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
                    <input type="date" name="dia" readonly value="<?php echo date("Y-m-d") ?>" class="form-control" placeholder="Fecha del viaje">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">Breve descripción del evento o
                      actividad:</strong>
                    <input type="text" name="description" id="description" value="" class="form-control" placeholder="Indique la descripción del evento">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Duración de la actividad(Horas):</strong>
                    <input type="number" name="duracion" id="duracion" value="" class="form-control" placeholder="Indique el número de horas para realizar del evento ">
                  </div>

                  <div class="col mt-4">
                    <strong for="fechain" class="form-label">Fecha inicio de la activiad:</strong>
                    <input type="date" name="fechain" id="fechain" value="" min=<?php $hoy = date("Y-m-d");
                                                                                echo $hoy; ?> max="15/09/2030"  class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>

                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Fecha fin de la actividad:</strong>
                    <input type="date" name="fechafi" id="fechafi" value="" min=<?php $hoy = date("Y-m-d");
                                                                                        echo $hoy; ?> max="2030-09-15" class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Asistentes a la actividad:</strong>
                    <input type="number" name="asistente" id="asistente" value="" class="form-control" placeholder="Indique la cantidad de personas.">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">ID quien autoriza:</strong>
                    <input type="numbre" id="autoriza" name="autoriza" value="" readonly required class="form-control" placeholder="ID de quien autoriza">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">Nombre de quien autoriza:</strong>
                    <select name="nombreauto" id="nombreauto" required class="form-control">
                      <option value="">--Indique el nombre de quien autoriza--</option>
                      @foreach($autorizas as $autoriza)

                      <option value="{{$autoriza->name}}">{{$autoriza->name}}</option><br>

                      @endforeach
                    </select>
                    <input type="hidden" name="correoautorizadores" id="correoautorizadores" value="">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Nombre de jefe que autoriza:</strong>
                    <input type="text" name="jefeautori" id="jefeautori" readonly value="" class="form-control" placeholder="Indique el nombre del jefe autorizador ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Solicitud realizada por:</strong>
                    <input type="text" name="nombresolici" id="nombresolici" value="{{ Auth::user()->name }}{{ Auth::user()->apellidos }}" class="form-control" placeholder="Indique el nombre de la persona que solicita el servicio ">
                    <input type="hidden" name="username" id="username" value="{{  Auth::user()->username}}">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Centro de costos:</strong>
                    <input type="text" name="centrocosto" id="centrocosto" value="{{ Auth::user()->programa }}"  class="form-control" placeholder="Indique el centro de costos ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Correo electronico:</strong>
                    <input type="text" name="correoautori" id="correoautori" value="{{ Auth::user()->email }}" class="form-control" placeholder="Indique el correo electronico ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Persona que recibe:</strong>
                    <input type="text" name="recoge" id="recoge" value="" class="form-control" placeholder="Indique el nombre de la persona que recibe">

                    <strong for="dia" class="form-label">Telefono de persona que recibe:</strong>
                    <input type="text" name="telefrecibe" id="telefrecibe" value="" class="form-control" placeholder="Indique el número de telefono de la persona que recibe">
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
                      <strong for="nombre" class="form-label">Nombre del concesionario o
                        proveedor:</strong>

                      <select class="form-control" name="Nombreprove" id="Nombreprove">
                        <option value="">--Selecciona un proveedor</option>
                        @foreach($proveedores as $proveedore)
                        <option class="selectpicker" value="{{ $proveedore->id }}">
                          {{ $proveedore->nombreProvee }}
                        </option>
                        @endforeach
                      </select>

                    </div><br>
                    <div class="col">
                      <strong for="correo" class="form-label">Correo institucional:</strong>
                      <input type="email" name="Correoelectroni" value="" class="form-control" id="Correoelectroni" placeholder="Digite su correo instritucional">
                    </div>
                    <div class="col">
                      <strong for="correo" class="form-label">Teléfono:</strong>
                      <input type="text" name="Teléfono" value="" class="form-control" id="Teléfono" placeholder="Digite su teléfono">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="form-label">Nombre de contacto 1:</strong>
                      <input type="text" name="nombrecontactouno" id="nombrecontactouno" value="" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                    </div><br>
                    <div class="col">
                      <strong for="Cargo" class="form-label">Teléfono de contacto 1:</strong>
                      <input type="text" name="telefonouno" value="" id="telefonouno" class="form-control" placeholder="Digite su cargo" aria-label="Cargo">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="form-label">Nombre de contacto 2:</strong>
                      <input type="text" name="nombrecontactodos" id="nombrecontactodos" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                    </div><br>
                    <div class="col">
                      <strong for="Cargo" class="form-label">Teléfono de contacto 2:</strong>
                      <input type="text" name="telefonodos" id="telefonodos" class="form-control" placeholder="Digite su cargo">
                    </div>
                    <p type="" name="id" id="id" value=""></p>
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
                      <div class="row">
                        <div class="col-md-2">
                          <strong class=" text-primary" for="fecha" class="form-label">Fecha</strong>
                          <input type="date" name="fechasoliciuno" id="fechasoliciuno" value="" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                                          echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                        </div>
                        <div class="col-md-2">
                          <strong class=" text-primary" for="hora" class="form-label">Hora</strong>
                          <input type="time" name="horauno" id="horauno" value="" class="form-control" aria-label="Cargo">
                        </div>
                        <div class="col-md-3">
                          <strong class=" text-primary" for="lugar" class="form-label">Lugar</strong>
                          <input type="text" name="lugaruno" id="lugaruno" value="" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <strong class=" text-primary"  class="form-label">Producto a entregar</strong>
                          <select  name="producto" id="producto" class="form-control">
                                  <option value="">Selecione</option>
                          </select>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-2">
                          <strong class=" text-primary" for="Cantidad" class="form-label">Cantidad</strong>
                          <input type="number" name="cantidad" id="cantidad" value="" class="form-control">
                        </div>
                        <div class="col-md-2">
                          <strong class=" text-primary"  class="form-label">Valor unitario</strong>
                          <input type="number" name="valorunid" id="valorunid" value="" class="form-control">
                          <!-- <select  name="valorunid" id="valorunid" class="form-control">
                                  <option value="">Selecione</option>
                          </select> -->
                        </div>
                        <div class="col-md-3">
                          <strong class=" text-primary" for="lugar" class="form-label">Valor total</strong>
                          <input type="number" name="valortota" id="valortota" value="" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <strong class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</strong>
                          <input class="form-control" type="text" id="persrecibe" name="persrecibe" value="">
                        </div>
                      </div>
                      <hr>
                      <!-- .................................................................................................................. -->
                      <div class="container" id="encuestser" style="display:none ;">
                        <div class="row">
                          <div class="col-md-2">
                            <strong class=" text-primary" for="fecha" class="form-label">Fecha</strong>
                            <input type="date" name="fechasolicidos" id="fechasolicidos" value="" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                                            echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                          </div>
                          <div class="col-md-2">
                              <strong class=" text-primary" for="hora" class="form-label">Hora</strong>
                              <input type="time" name="horados" id="horados" value="" class="form-control" aria-label="Cargo">
                          </div>
                          <div class="col-md-3">
                              <strong class=" text-primary" for="lugar" class="form-label">Lugar</strong>
                              <input type="text" name="lugardos" id="lugardos" value="" class="form-control">
                          </div>
                          <div class="col-md-4">
                              <strong class=" text-primary" for="producto" class="form-label">Producto a entregar</strong>
                              <select type="text" name="productodos" id="productodos" value="" class="form-control">
                                  <option value="">--Selecciona un producto</option>
                                  @forelse($productos as $producto)
                                  <option value="{{ $producto->id }}">
                                    {{ $producto->nombreProduc }}
                                  </option>
                                  @empty
                                  <option value="">--Selecciona un producto</option>
                                  @endforelse
                              </select>                      
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-2">
                            <strong class=" text-primary" for="Cantidad" class="form-label">Cantidad</strong>
                            <input type="number" name="cantidaddos" id="cantidaddos" value="" class="form-control">
                          </div>
                          <div class="col-md-2">
                            <strong class=" text-primary" for="hora" class="form-label">Valor unitario</strong>
                            <input type="number" name="valoruniddos" id="valoruniddos" value="" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <strong class=" text-primary" for="lugar" class="form-label">Valor total</strong>
                            <input type="number" name="valortotados" id="valortotados" value="" class="form-control">
                          </div>
                          <div class="col-md-4">
                            <strong class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</strong>
                            <input class="form-control" type="text" id="persrecibedos" name="persrecibedos" value="">
                          </div>
                        </div>
                      </div>

                      <hr>
                      <div class="col-md-3">
                        <div class="row">
                          <strong class=" text-primary" for="recibe" class="form-label">¿Desea pedir mas de un producto?</strong>
                          <div class="form-check form-check-radio">
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="mas" id="mas" value="SI">SI
                              <span class="circle">
                                <span class="check"></span>
                              </span>
                            </label>
                            <label class="form-check-label">
                              <input class="form-check-input" type="radio" name="mas" id="mas" value="NO" checked>NO
                              <span class="circle">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="estado" id="estado" value="pendiente">
                <input type="hidden" name="email_jefe" id="email_jefe" value="{{  Auth::user()->email_jefe}}">
                <input type="hidden" name="jefe" id="jefe" value="{{  Auth::user()->jefe}}">
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

      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
      </script>
      <script type="text/javascript" src="{{ asset('public/js/proveedor.js')}}"></script>
     