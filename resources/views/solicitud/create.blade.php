@extends('layouts.main', ['activePage' => 'Solicitud', 'titlePage' => __('Formulario de solicitud')])
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
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
           
              <div class="container">
                <div class="card">
                <div class="row">
                  <div class="col-md-6 ">
                    <div class="col  mt-4">
                      <label for="dia" class=" text-primary">Fecha de la solicitud:</label>
                      <input type="date" name="dia" readonly value="<?php echo date("Y-m-d") ?>" class="form-control" placeholder="Fecha del viaje">
                    </div>
                    <div class="col  mt-4">
                      <label for="dia" class=" text-primary">Breve descripción del evento o
                        actividad:</label>
                      <input type="text" name="description" id="description" value="" class="form-control" placeholder="Indique la descripción del evento">
                    </div>
                    <div class="col mt-4">
                      <label for="dia" class=" text-primary">Duración de la actividad(Horas):</label>
                      <input type="number" name="duracion" id="duracion"required  value="" class="form-control" placeholder="Indique el número de horas para realizar del evento ">
                    </div>
                    <div id="alerta"></div>
                    <div class="row ml-2 mt-4">
                        <div class="col-md-6">
                          <label for="fechain" class="text-primary">Fecha inicio de la activiad:</label>
                          <input type="date" name="fechain" id="fechain"required  value="" min=<?php $hoy = date("Y-m-d");
                              echo $hoy; ?> max="15/09/2030"  class="form-control" placeholder="Indique las horas de duración del evento ">
                        </div>

                        <div class="col-md-6">
                          <label for="dia" class=" text-primary">Fecha fin de la actividad:</label>
                          <input type="date" name="fechafi" id="fechafi"required  value="" min=<?php $hoy = date("Y-m-d");
                                                                                              echo $hoy; ?> max="2030-09-15" class="form-control" placeholder="Indique las horas de duración del evento ">
                        </div>
                    </div> 
                    <div class="col mt-4" >
                      <label for="dia" class=" text-primary">Asistentes a la actividad:</label>
                      <select name="asistente" id="asistente" required  class="form-control selectpicker" data-style="text-dark"
                      title="Selecciona un tipo de asistente">
                        <option value=""></option>
                        <option value="Personal Interno">Personal Interno</option>
                        <option value="Personal Externo">Personal Externo</option>
                        <option value="Personal Interno yExterno">Personal Interno y Externo</option>
                      </select>
                    </div>                
                    <div class="col-md-12  mt-4" >
                        <label for="dia" class="text-primary">
                            Descripción de asistentes:
                        </label>
                        <!-- <input  id="observAsistente" placeholder="Seleccione tipo de asistente" class="form-control"  required /> -->
                        <select id="observAsistente"   class="form-control   text-primary selectpicker" required name="observAsistente[]" multiple="multiple"
                                data-style="text-dark" title="Selecciona un tipo de asistente">
                                <option value=""></option>
                                <option value="Estudiantes">Estudiantes</option>
                                <option value="Administartivos">Administartivos</option>
                                <option value="Docentes">Docentes</option>
                                <option value="Empresarios">Empresarios</option>
                                <option value="Aspirantes">Aspirantes</option>
                                <option value="Egresados">Egresados</option>
                            </select>
                    </div>
                    <div class="col mt-4" style="text-transform:capitalize;" >
                      <label for="dia" class=" text-primary">Persona que recibe:</label>
                      <input type="text" name="recoge" id="recoge" value=""  onkeypress="mayus(this);" class="form-control" placeholder="Indique el nombre de la persona que recibe">

                      <label for="dia" class=" text-primary mt-4">Teléfono de persona que recibe:</label>
                      <input type="text" name="telefrecibe" id="telefrecibe" value="" class="form-control" placeholder="Indique el número de telefono de la persona que recibe">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="col  mt-4">
                      <label for="dia" class="text-primary ">ID de persona que autoriza:</label>
                      <input type="numbre" id="autoriza" name="autoriza" value="" readonly required class="form-control" placeholder="ID de quien autoriza">
                    </div>
                    <div class="col  mt-4">
                      <label for="dia" class=" text-primary">Nombre de persona autorizada ante el proveedor:</label>
                      <select name="nombreauto" id="nombreauto" required class="form-control selectpicker" data-style="text-dark"
                      title="Indique el nombre de quien autoriza">
                        
                        @foreach($autorizas as $autoriza)

                        <option value="{{$autoriza->name}}">{{ $autoriza->name  }} {{ $autoriza->apellidos }}</option><br>

                        @endforeach
                      </select>

                      <input type="hidden" name="correoautorizadores" id="correoautorizadores" value="">
                      <input type="hidden" name="ids" id="ids" value="">
                        <div class="col-md-12 mt-4" id="prosionaldiv" style="display:none">
                          <label for="dia" class="text-primary">Nombre del profesional  de gestion de proyectos:</label>
                            <select name="profesional" id="profesional" class="form-control ">
                            </select>
                        </div>
                    </div>
                    <div class="col mt-4">
                      <label for="dia" class=" text-primary">Nombre unidad que autoriza:</label>
                      <input type="text" name="unidadAutori" id="unidadAutori" readonly value="" class="form-control" placeholder="Indique la unidad que autoriza ">
                    </div>
                    <div class="col mt-4">
                      <label for="dia" class=" text-primary">Nombre de jefe que autoriza:</label>
                      <input type="text" name="jefeautori" id="jefeautori" readonly value="" class="form-control" placeholder="Indique el nombre del jefe autorizador ">
                    </div>
                  
                    <div class="col mt-4">
                      <label for="dia" class=" text-primary">Solicitud realizada por:</label>
                      <input type="text" name="nombresolici" id="nombresolici" value="{{ Auth::user()->name }}{{ Auth::user()->apellidos }}" class="form-control" placeholder="Indique el nombre de la persona que solicita el servicio ">
                      <input type="hidden" name="username" id="username" value="{{  Auth::user()->username}}">
                    </div>
                    <div class="col mt-4">
                      <label for="dia" class=" text-primary">Centro de costos:</label>
                      <input type="text" name="centrocosto" id="centrocosto" value="{{ Auth::user()->programa }}"  class="form-control" placeholder="Indique el centro de costos ">
                    </div>
                    <div class="col mt-4">
                      <label for="dia" class=" text-primary">Observación del centro de costos:</label>
                      <input type="text" name="observCentrocosto" id="observCentrocosto" value=""  class="form-control" placeholder="Indique el centro de costos ">
                    </div>
                    <div class="col mt-4">
                      <label for="dia" class=" text-primary">Correo electronico:</label>
                      <input type="text" name="correoautori" id="correoautori" value="{{ Auth::user()->email }}" class="form-control" placeholder="Indique el correo electronico ">
                    </div> 
                  </div>
                </div>
              </div>
          </div>

              <div class=" card-body"><br>
                <div class="alert alert-primary alert-dismissible" role="alert">
                  <h4>Sobre el concesionario o proveedor</h4>
                </div>
                <div class="container">
                  <div class="card">
                    <div class="row mb-4">
                      <div class="col-md-4">
                        <div class="col">
                          <label for="nombre" class=" text-primary">Nombre del concesionario o proveedor:</label>
                            <select class="form-control selectpicker" required name="Nombreprove" id="Nombreprove" data-style="text-dark"
                                title="Seleccione el proveedor">
                              <option value=""></option>
                              @foreach($proveedores as $proveedore)
                              <option class="selectpicker" value="{{ $proveedore->id }}">
                                {{ $proveedore->nombreProvee }}
                              </option>
                              @endforeach
                            </select>

                        </div><br>
                        <div class="col">
                          <label for="correo" class=" text-primary">Correo institucional:</label>
                          <input type="email" name="Correoelectroni" value="" class="form-control" id="Correoelectroni" placeholder="Digite su correo instritucional">
                        </div>
                        <div class="col">
                          <label for="correo" class=" text-primary">Teléfono:</label>
                          <input type="text" name="Teléfono" value="" class="form-control" id="Teléfono" placeholder="Digite su teléfono">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="col">
                          <label for="nombre" class=" text-primary">Nombre de contacto 1:</label>
                          <input type="text" name="nombrecontactouno" id="nombrecontactouno" value="" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                        </div><br>
                        <div class="col">
                          <label for="Cargo" class=" text-primary">Teléfono de contacto 1:</label>
                          <input type="text" name="telefonouno" value="" id="telefonouno" class="form-control" placeholder="Digite su cargo" aria-label="Cargo">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="col">
                          <label for="nombre" class=" text-primary">Nombre de contacto 2:</label>
                          <input type="text" name="nombrecontactodos" id="nombrecontactodos" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                        </div><br>
                        <div class="col">
                          <label for="Cargo" class=" text-primary">Teléfono de contacto 2:</label>
                          <input type="text" name="telefonodos" id="telefonodos" class="form-control" placeholder="Digite su cargo">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4">
                  <div class="card" >
                    <div class="card-header card-header-primary">
                      <h4 class="card-title ">Solicitud del servicio de alimentación y bebidas </h4>
                    </div>
                    <div class="card-body">
                      <div class="container">
                        <div class="card">
                          <div class="card-body">
                            <div class="row mt-4">
                              <div class="col-md-2">
                                <label class=" text-primary" for="fecha" class="form-label">Fecha de entrega</label>
                                <input type="date" name="fechasoliciuno" required id="fechasoliciuno" value="" class="form-control" min=<?php $hoy = date("Y-m-d");
                                   echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                              </div>
                              <div class="col-md-2">
                                <label class=" text-primary" for="hora" class="form-label">Hora</label>
                                <input type="time" name="horauno" id="horauno" required value="" class="form-control" aria-label="Cargo">
                              </div>
                              <div class="col-md-3">
                                <label class=" text-primary" for="lugar" class="form-label">Lugar</label>
                                <input type="text" name="lugaruno" id="lugaruno" required value="" class="form-control">
                              </div>
                              <div class="col-md-4 ">
                                <label class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</label>
                                <input class="form-control" type="text" id="persrecibe" name="persrecibe" value="">
                              </div>
                            </div>
                            
                            <div class="row mt-4">
                              <div class="col-md-4" >
                                <label class=" text-primary"  class="form-label">Producto a entregar</label>
                                <select  name="producto" id="producto" required class="form-control"></select>
                              </div>
                              <div class="col-md-2">
                                <label class=" text-primary" for="Cantidad" class="form-label">Cantidad</label>
                                <input type="number" tag="" name="cantidad" id="cantidad" required value="" class="form-control">
                              </div>
                              <div class="col-md-2">
                                <label class=" text-primary"  class="form-label">Valor unitario</label>
                                <input type="number" name="valorunid" id="valorunid" readonly value="" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label class=" text-primary" for="lugar" class="form-label">Subtotal</label>
                                <input type="number" name="valortota" id="valortota" readonly value="0" class="form-control">
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                          {{-- <!-- ...........segundo producto.................................................................................... -- --}}
                      <div class="container" id="masFactuas" style="display:none;">
                        <div class="container">
                          <div class="card">
                            <div class="row  mt-4">
                              <div class="col-md-2">
                                <label class=" text-primary" for="fecha" class="form-label">Fecha de entrega</label>
                                <input type="date" name="fechasolicidos" id="fechasolicidos" value="" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                                                echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                              </div>
                              <div class="col-md-2">
                                  <label class=" text-primary" for="hora" class="form-label">Hora</label>
                                  <input type="time" name="horados" id="horados" value="" class="form-control" aria-label="Cargo">
                              </div>
                              <div class="col-md-3">
                                  <label class=" text-primary" for="lugar" class="form-label">Lugar</label>
                                  <input type="text" name="lugardos" id="lugardos" value="" class="form-control">
                              </div>
                              <div class="col-md-4">
                                <label class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</label>
                                <input class="form-control" type="text" id="persrecibedos" name="persrecibedos" value="">
                              </div>                      
                            </div>
                            <div class="row  my-4">
                              <div class="col-md-4">
                                <label class=" text-primary" for="productodos" class="form-label">Producto a entregar</label>
                                <select type="text" name="productodos" id="productodos" value="" class="form-control"></select>                      
                              </div>
                              <div class="col-md-2 ">
                                <label class=" text-primary" for="Cantidad" class="form-label">Cantidad</label>
                                <input type="number"tag="dos" name="cantidaddos" id="cantidaddos" value="" class="form-control">
                              </div>
                              <div class="col-md-2">
                                <label class=" text-primary" for="hora" class="form-label">Valor unitario</label>
                                <input type="number" name="valoruniddos" id="valoruniddos" readonly value="" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label class=" text-primary" for="lugar" class="form-label">Subtotal</label>
                                <input type="number" name="valortotados" id="valortotados" readonly value="0" class="form-control">
                              </div>   
                            </div>
                          </div>
                        </div>   
                        {{-- producto tres----- --}}
                        <div class="container">
                          <div class="card">
                            <div class="row mt-4">
                              <div class="col-md-2">
                                <label class=" text-primary" for="fecha" class="form-label">Fecha de entrega</label>
                                <input type="date" name="fechasolicitres" id="fechasolicitres" value="" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                                                echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                              </div>
                              <div class="col-md-2">
                                  <label class=" text-primary" for="hora" class="form-label">Hora</label>
                                  <input type="time" name="horatres" id="horatres" value="" class="form-control" aria-label="Cargo">
                              </div>
                              <div class="col-md-3">
                                  <label class=" text-primary" for="lugar" class="form-label">Lugar</label>
                                  <input type="text" name="lugartres" id="lugartres" value="" class="form-control">
                              </div>
                              <div class="col-md-4">
                                <label class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</label>
                                <input class="form-control" type="text" id="persrecibetres" name="persrecibetres" value="">
                              </div>
                            </div>
                      
                            <div class="row  mt-4" >
                              <div class="col-md-4">
                                <label class=" text-primary" for="productotres" class="form-label">Producto a entregar</label>
                                <select type="text" name="productotres" id="productotres" value="" class="form-control"></select>                      
                              </div>
                              <div class="col-md-2">
                                <label class=" text-primary" for="Cantidad" class="form-label">Cantidad</label>
                                <input type="number"tag="tres" name="cantidadtres" id="cantidadtres" value="" class="form-control">
                              </div>
                              <div class="col-md-2">
                                <label class=" text-primary" for="hora" class="form-label">Valor unitario</label>
                                <input type="number" name="valorunidtres" id="valorunidtres" readonly value="" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label class=" text-primary" for="lugar" class="form-label">Subtotal</label>
                                <input type="number" name="valortotatres" id="valortotatres" readonly value="0" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                        {{-- ----------cuatroproductos------------------------ --}}
                        <div class="container">
                          <div class="card">
                            <div class="row mt-4">
                              <div class="col-md-2">
                                <label class=" text-primary" for="fecha" class="form-label">Fecha de entrega</label>
                                <input type="date" name="fechasolicicuatro" id="fechasolicicuatro" value="" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                                                echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                              </div>
                              <div class="col-md-2">
                                  <label class=" text-primary" for="hora" class="form-label">Hora</label>
                                  <input type="time" name="horacuatro" id="horacuatro" value="" class="form-control" aria-label="Cargo">
                              </div>
                              <div class="col-md-3">
                                  <label class=" text-primary" for="lugar" class="form-label">Lugar</label>
                                  <input type="text" name="lugarcuatro" id="lugarcuatro" value="" class="form-control">
                              </div>
                              <div class="col-md-4">
                                <label class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</label>
                                <input class="form-control" type="text" id="persrecibecuatro" name="persrecibecuatro" value="">
                              </div>
                            </div>
                      
                            <div class="row  mt-4" >
                              <div class="col-md-4">
                                <label class=" text-primary" for="productodos" class="form-label">Producto a entregar</label>
                                <select type="text" name="productocuatro" id="productocuatro" value="" class="form-control"></select>                      
                              </div>
                              <div class="col-md-2">
                                <label class=" text-primary" for="Cantidad" class="form-label">Cantidad</label>
                                <input type="number"tag="cuatro" name="cantidadcuatro" id="cantidadcuatro" value="" class="form-control">
                              </div>
                              <div class="col-md-2">
                                <label class=" text-primary" for="hora" class="form-label">Valor unitario</label>
                                <input type="number" name="valorunidcuatro" id="valorunidcuatro" readonly value="" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label class=" text-primary" for="lugar" class="form-label">Subtotal</label>
                                <input type="number" name="valortotacuatro" id="valortotacuatro" readonly value="0" class="form-control">
                              </div>
                            </div>
                          </div>
                        </div>
                      {{-- -----------cinco  productos------------------------ --}}
                      <div class="container">
                        <div class="card">
                          <div class="card-body">
                            <div class="row  mt-4">
                            
                              <div class="col-md-2 ">
                                <label class=" text-primary" for="fecha" class="form-label">Fecha de entrega</label>
                                <input type="date" name="fechasolicicinco" id="fechasolicicinco" value="" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                                                echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                              </div>
                              <div class="col-md-2">
                                  <label class=" text-primary" for="hora" class="form-label">Hora</label>
                                  <input type="time" name="horacinco" id="horacinco" value="" class="form-control" aria-label="Cargo">
                              </div>
                              <div class="col-md-3">
                                  <label class=" text-primary" for="lugar" class="form-label">Lugar</label>
                                  <input type="text" name="lugarcinco" id="lugarcinco" value="" class="form-control">
                              </div>
                              <div class="col-md-4">
                                <label class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</label>
                                <input class="form-control" type="text" id="persrecibecinco" name="persrecibecinco" value="">
                              </div>
                            </div>
                        
                            <div class="row  mt-4" >
                              <div class="col-md-4">
                                <label class=" text-primary" for="productodos" class="form-label">Producto a entregar</label>
                                <select type="text" name="productocinco" id="productocinco" value="" class="form-control"></select>                      
                              </div>
                              <div class="col-md-2">
                                <label class=" text-primary" for="Cantidad" class="form-label">Cantidad</label>
                                <input type="number" tag="cinco" name="cantidadcinco" id="cantidadcinco" value="" class="form-control">
                              </div>
                              <div class="col-md-2">
                                <label class=" text-primary" for="hora" class="form-label">Valor unitario</label>
                                <input type="number" name="valorunidcinco" id="valorunidcinco" value="" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label class=" text-primary" for="lugar" class="form-label">Subtotal</label>
                                <input type="number" name="valortotacinco" id="valortotacinco" value="0" class="form-control">
                              </div>     
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    {{-- -----------fin productos------------------------ --}}
           
                    <div class="container">
                      <div class="card">
                          <div class="row text-center">
                            <div class="col-md-6">
                              <label class="text-primary" for="lugar" class="form-label"><h3>Valor total de la factura:</h3></label>
                            
                            </div>
                            <div class="col-md-5 mt-3">
                              <input type="number"  name="valortotalfinal" id="valortotalfinal" value="0" class="form-control">
                            </div>
                          </div>
                        </div>
                    </div>
                      {{-- finaliza mas productos --}}
                      <div class="container">
                          <div class="card">
                            <div class="row">
                              <div class="col-md-5 text-center">
                                <label class=" text-primary" for="recibe" class="form-label"><h3>Observaciónes del pedido </h3></label>
                                <input class="form-control" type="textarea" id="observacion" name="observacion" value=""
                                placeholder="Pequeña observación adicional sobre el pedido ">
                              </div>
                              <div class="col-md-5 text-center">
                                <label class="text-primary" for="recibe" class="form-label"><h3>¿Desea pedir mas de un producto?</h3></label>
                                <div class="form-check form-check-radio" >
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="mas" id="mas" value="SI">SI
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
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="estado" id="estado" value="Pendiente">
                      <input type="hidden" name="email_jefe" id="email_jefe" value="{{  Auth::user()->email_jefe}}">
                      <input type="hidden" name="email" id="email" value="{{  Auth::user()->email}}">
                      <input type="hidden" name="jefe" id="jefe" value="{{  Auth::user()->jefe}}">
                      <input type="hidden" name="jefenombre" id="jefenombre" value="{{  Auth::user()->nombre_jefe}} {{  Auth::user()->apellido_jefe}}">
                      <div class="row ml-4">
                        <div class="col-md-2">
                          <button class="btn btn-success" type="submit">Enviar Solicitud</button>
                        </div> <br>
                        <div class="col ml-2"> <a href="{{ url('solicitud/') }}" class="btn btn-primary">Regresar</a></div>
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
   
      
      @endsection
      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="{{ asset('js/main/eventos.js') }}"></script>
      <script src="{{ asset('js/main/profesional.js') }}"></script>
      <script src="{{ asset('js/masProducto.js') }}"></script>
      <script src="{{ asset('js/main/autorizadores.js') }}"></script>
      <script src="{{ asset('js/main/proveedores.js') }}"></script>
      <script src="{{ asset('js/main/productos.js') }}"></script>
      <script src="{{ asset('js/main/subtotales.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
       <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
      <script>
        $(document).ready(function() {
          $("#Nombreprove").on('change', function() {
            let s = $("#Nombreprove").val();
            let url = $(this).attr('action')
            $.ajax({
              url: "{{ route('ajax.register')}}",
              type: 'POST',
              data: $("#form1").serialize(),
            }).done(function(res) {

                console.log(res);
                document.getElementById("ids").value = res[0].id;
                document.getElementById("Correoelectroni").value = res[0].correoProvee;
                document.getElementById("Teléfono").value = res[0].telProvee;
                document.getElementById("nombrecontactouno").value = res[0].nombreContac;
                document.getElementById("telefonouno").value = res[0].telProvee;
                document.getElementById("nombrecontactodos").value = res[0].nombrecontactodos;
                document.getElementById("telefonodos").value = res[0].telefonodos;
                $("#producto").empty();
                $("#valorunid").empty();
                $("#producto").append('<option class="form-control" value=""> Selecciona un producto</option>');
                $("#productodos").append('<option class="form-control" value=""> Selecciona un producto</option>');
                $("#productotres").append('<option class="form-control" value=""> Selecciona un producto</option>');
                $("#productocuatro").append('<option class="form-control" value=""> Selecciona un producto</option>');
                $("#productocinco").append('<option class="form-control" value=""> Selecciona un producto</option>');
                for(let i=0; i<res.length; ++i){
                  // let html_select ='<option value="">Seleccione producto</option';
                  $("#producto").append(
                    '<option class="form-control" value="'+res[i].id+'">'+res[i].nombreProduc+'</option>');
                 
                  $("#productodos").append(
                      '<option class="form-control" value="'+res[i].id+'">'+res[i].nombreProduc+'</option>');
                  
                  $("#productotres").append(
                      '<option class="form-control" value="'+res[i].id+'">'+res[i].nombreProduc+'</option>');
            
                  $("#productocuatro").append(
                      '<option class="form-control" value="'+res[i].id+'">'+res[i].nombreProduc+'</option>');
                  
                  $("#productocinco").append(
                    '<option class="form-control" value="'+res[i].id+'">'+res[i].nombreProduc+'</option>');
  
                }
              })
            })
           
           });
  
      </script>
    