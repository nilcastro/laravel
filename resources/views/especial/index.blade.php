@extends('layouts.main', ['activePage' => 'especial', 'titlePage' => __('Especial')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
      <form action="{{ url('/solicitud') }}" method="post" enctype="multipart/form-data">
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
                    <strong for="dia" class="form-label">Breve descripción del evento o actividad:</strong>
                    <input type="text" name="description" id="description" value="" class="form-control" placeholder="Indique la descripción del evento">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Duración de la actividad(Horas):</strong>
                    <input type="number" name="duracion" id="duracion" value="" class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Fecha inicio de la activiad:</strong>
                    <input type="date" name="fechain" id="fechain" value="" min=<?php $hoy = date("Y-m-d");
                                                                                echo $hoy; ?> max="2030-09-15" class="form-control" placeholder="Indique las horas de duración del evento ">
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
                    <input type="numbre" id="autoriza" name="autoriza" class="form-control" placeholder="ID de quien autoriza">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">Nombre de quien autoriza:</strong>
                    <select  name="nombreauto" id="nombreauto" onchange="nombr()"  class="form-control" >
                   <option value="">--Indique el nombre de quien autoriza--</option>
                    @foreach($autorizas as $autoriza)
                    <option value="{{$autoriza->name}}">{{$autoriza->name}}</option><br>
                   
                    @endforeach
                  </select>
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Nombre de jefe que autoriza:</strong>
                    <input type="text" name="jefeautori" id="jefeautori" value="" class="form-control" placeholder="Indique el nombre del jefe autorizador ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Centro de costos:</strong>
                    <input type="text" name="centrocosto" id="centrocosto" value="" class="form-control" placeholder="Indique el centro de costos ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Correo electronico:</strong>
                    <input type="text" name="correoautori" id="correoautori" value="" class="form-control" placeholder="Indique el correo electronico ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Solicitud realizada por:</strong>
                    <input type="text" name="nombresolici" id="nombresolici" value="" class="form-control" placeholder="Indique el nombre de la persona que solicita el servicio ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Persona que recibe:</strong>
                    <input type="text" name="recibe" id="recibe" value="" class="form-control" placeholder="Indique el nombre de la persona que recibe.">
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
                      <select name="Nombreprove" id="Nombreprove" class="form-control">
                        <option value="">--Selecciona un proveedor</option>
                      @foreach($proveedores as $proveedor)
                      <option value="{{ $proveedor->nombreProvee }}">{{ $proveedor->nombreProvee }}</option>
                      @endforeach
                      </select>
                     
                    </div>
                    <div class="col">
                      <strong for="correo" class="form-label">Correo institucional:</strong>
                      <input type="email" name="Correoelectroni" value="" class="form-control" id="Correoelectroni" placeholder="Digite su correo instritucional">
                    </div>
                    <div class="col">
                      <strong for="correo" class="form-label">Teléfono:</strong>
                      <input type="text" name="Teléfono" value="" class="form-control" id="correo" placeholder="Digite su teléfono">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="form-label">Nombre de contacto 1:</strong>
                      <input type="text" name="nombrecontactouno" value="" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                    </div>
                    <div class="col">
                      <strong for="Cargo" class="form-label">Teléfono de contacto 1:</strong>
                      <input type="text" name="telefonouno" value=""  class="form-control" placeholder="Digite su cargo" aria-label="Cargo">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="form-label">Nombre de contacto 2:</strong>
                      <input type="text" name="nombrecontactodos" value="" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                    </div>
                    <div class="col">
                      <strong for="Cargo" class="form-label">Teléfono de contacto 2:</strong>
                      <input type="text" name="telefonodos" value=""  class="form-control" placeholder="Digite su cargo" aria-label="Cargo">
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
                              <th>Cantidad</th>
                              <th>Valor unitario</th>
                              <th>Valor total</th>
                              <th>Recibe a satisfacción</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td> <input type="date" name="fechasoliciuno" value="" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                echo $hoy; ?> max="2030-09-15" aria-label="Cargo">
                              </td>
                              <td>  <input type="time" name="horauno" value="" class="form-control" aria-label="Cargo"></td>
                              <td> <input type="text" name="lugaruno" id="lugaruno"></td>
                              <td><input type="text" name="producto" id=""></td>
                              <td class="text-primary"><input type="number" name="cantidad" id=""></td>
                              <td><input type="number" name="valorunid" id=""></td>
                              <td><input type="number" name="valortota" id=""></td>
                              <td><input type="text" name="recibe" id=""></td>
                              
                            </tr>
                           
                            
                          </tbody>
                        </table>
                      </div>
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
     <script>
     function autoriza(){
        var x = document.getElementById("nombr").value;
         console.log(x);
           
       
      };
     </script>
