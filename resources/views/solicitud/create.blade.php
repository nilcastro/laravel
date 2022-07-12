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
                    <input type="date" name="dia" readonly value="<?php echo date("Y-m-d")?>" class="form-control" placeholder="Fecha del viaje">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">Breve descripción del evento o actividad:</strong>
                    <input type="text" name="description" id="description" value="" class="form-control" placeholder="Indique la descripción del evento">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Duración de la actividad(Horas):</strong>
                    <input type="number" name="duracion" id="duracion" value="" class="form-control" placeholder="Indique el número de horas para realizar del evento ">
                  </div>
                
                  <div class="col mt-4">
                    <strong for="fechain" class="form-label">Fecha inicio de la activiad:</strong>
                    <input type="date" name="fechain" id="fechain" value="" min=<?php $hoy = date("Y-m-d");
                                                                                echo $hoy; ?> max="2030-09-15" class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>

                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Fecha fin de la actividad:</strong>
                    <input type="date" name="fechafi" id="fechafi" value="fechafi" min=<?php $hoy = date("Y-m-d");
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
                    <input type="numbre" id="autoriza" name="autoriza" value="" readonly class="form-control" placeholder="ID de quien autoriza">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">Nombre de quien autoriza:</strong>
                    <select name="nombreauto" id="nombreauto" class="form-control">
                      <option value="">--Indique el nombre de quien autoriza--</option>
                      @foreach($autorizas as $autoriza)
                      <option value="{{$autoriza->name}}">{{$autoriza->name}}</option><br>

                      @endforeach
                    </select>
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Nombre de jefe que autoriza:</strong>
                    <input type="text" name="jefeautori" id="jefeautori" readonly value="" class="form-control" placeholder="Indique el nombre del jefe autorizador ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Centro de costos:</strong>
                    <input type="text" name="centrocosto" id="centrocosto" value="" readonly class="form-control" placeholder="Indique el centro de costos ">
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
                    <input type="text" name="recibe" id="recibe" value="" class="form-control" placeholder="Indique el nombre de la persona que recibe">
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
                      <select name="Nombreprove" id="Nombreprove" class="form-control" class="Nombreprove">
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
                      <input type="text" name="Teléfono" value="" class="form-control" id="Teléfono" placeholder="Digite su teléfono">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="form-label">Nombre de contacto 1:</strong>
                      <input type="text" name="nombrecontactouno" id="nombrecontactouno" value="" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                    </div>
                    <div class="col">
                      <strong for="Cargo" class="form-label">Teléfono de contacto 1:</strong>
                      <input type="text" name="telefonouno" value="" id="telefonouno" class="form-control" placeholder="Digite su cargo" aria-label="Cargo">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="form-label">Nombre de contacto 2:</strong>
                      <input type="text" name="nombrecontactodos" id="nombrecontactodos" value="" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                    </div>
                    <div class="col">
                      <strong for="Cargo" class="form-label">Teléfono de contacto 2:</strong>
                      <input type="text" name="telefonodos" id="telefonodos" value="" class="form-control" placeholder="Digite su cargo" >
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
                        <div class="row">
                          <div class="col-md-3">
                            
                          </div>
                          <div class="col-md-3">
                            
                          </div>
                          <div class="col-md-3">
                            
                          </div>
                          <div class="col-md-3">
                            
                          </div>

                        </div>
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
                              <td> <input type="date" name="fechasoliciuno" id="fechasoliciuno" value="" class="form-control" min=<?php $hoy = date("Y-m-d");
                                                                                                              echo $hoy; ?> max="2030-09-15" class="form-control" aria-label="Cargo">
                              
                            </td>
                              <td>
                                <input type="time" name="horauno" id="horauno" value="horauno" class="form-control" aria-label="Cargo">
                              </td>
                              <td> <input type="text" name="lugaruno" id="lugaruno" value="" class="form-control"></td>
                              <td><select type="text" name="producto" id="producto" value="" class="form-control">
                                  <option value="">--Selecciona un producto</option>
                                  @foreach($productos as $producto)
                                  <option value="{{ $producto->id }}">{{ $producto->nombreProduc }}</option>
                                  @endforeach
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
                            <td><input type="number" name="cantidad" id="cantidad" value=""  class="form-control"></td>
                            <td><input type="number" name="valorunid" id="valorunid"value="" class="form-control"></td>
                              <td><input type="number" name="valortota" id="valortota" value="" class="form-control"></td>
                              <td><input type="text" name="recibe" id="recibe" value="" class="form-control"></td>
                              
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
      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
      </script>
      <script>
        const fechain = document.getElementById('fechain');

        window.addEventListener('load', function() {

          if (fechain) {
            fechain.addEventListener('click', function() {
              alert("hola");
              console.log(fechain);
            });
          }


        });
      </script>
      <script>
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
      </script>
      <script>
        $(document).ready(function() {

          //alert("hola");
          $("#Nombreprove").on('change', function() {
            var s = $("#Nombreprove").val();
            //alert("hola");
            console.log(s);
            var url = $(this).attr('action')
            $.ajax({
              url: "{{ route('ajax.register')}}",
              type: 'POST',
              data: $("#form1").serialize(),
              success: function(res) {
                // console.log(res[0].precio);
                document.getElementById("Correoelectroni").value = res[0].correoProvee;
                document.getElementById("Teléfono").value = res[0].telProvee;
                document.getElementById("nombrecontactouno").value = res[0].nombreContac;
                document.getElementById("telefonouno").value = res[0].telProvee;
              }
            })
          });

        });
      </script>

      <script>
        $(document).ready(function() {

          //alert("hola");
          $("#producto").on('change', function() {
            var s = $("#producto").val();
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
      </script>

      <script>
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

<script>
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
      </script>

      <script>
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