@extends('layouts.main', ['activePage' => 'solicitud', 'titlePage' => __('Solicitud')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ url('/autorizacion') }}" method="post" enctype="multipart/form-data" id="form1">
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
                    <strong for="dia" class="form-label">Fecha de la solicitudes:</strong>
                    <input type="date" name="dia" readonly value="{{ isset($solicitud->dia)?$solicitud->dia:old('dia') }}" class="form-control" placeholder="Fecha del viaje">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">Breve descripción del evento o
                      actividad:</strong>
                    <input type="text" name="description" id="description" value="{{ isset($solicitud->description)?$solicitud->description:old('description') }}" class="form-control" placeholder="Indique la descripción del evento">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Duración de la actividad(Horas):</strong>
                    <input type="number" name="duracion" id="duracion" value="{{ isset($solicitud->duracion)?$solicitud->duracion:old('duracion') }}" class="form-control" placeholder="Indique el número de horas para realizar del evento ">
                  </div>
                  {{ isset($solicitud->ID_jefe)?$solicitud->ID_jefe:old('ID_jefe') }}
                  <div class="col mt-4">
                    <strong for="fechain" class="form-label">Fecha inicio de la activiad:</strong>
                    <input type="date" name="fechain" id="fechain" value="{{ isset($solicitud->fechain)?$solicitud->fechain:old('fechain') }}" class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>

                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Fecha fin de la actividad:</strong>
                    <input type="date" name="fechafi" id="fechafi" value="{{ isset($solicitud->fechafi)?$solicitud->fechafi:old('fechafi') }}"  class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Asistentes a la actividad:</strong>
                    <input type="number" name="asistente" id="asistente" value="{{ isset($solicitud->asistente)?$solicitud->asistente:old('asistente') }}" class="form-control" placeholder="Indique la cantidad de personas.">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">ID quien autoriza:</strong>
                    <input type="numbre" id="autoriza" name="autoriza" value="{{ isset($solicitud->autoriza)?$solicitud->autoriza:old('autoriza') }}" readonly class="form-control" placeholder="ID de quien autoriza">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="form-label">Nombre de quien autoriza:</strong>
                    <select name="nombreauto" id="nombreauto" class="form-control">
                      <option value="{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}">{{ isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto') }}</option><br>
                    </select>
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Nombre de jefe que autoriza:</strong>
                    <input type="text" name="jefeautori" id="jefeautori" readonly value="{{ isset($solicitud->jefeautori)?$solicitud->jefeautori:old('jefeautori') }}" class="form-control" placeholder="Indique el nombre del jefe autorizador ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Centro de costos:</strong>
                    <input type="text" name="centrocosto" id="centrocosto" value="{{ isset($solicitud->centrocosto)?$solicitud->centrocosto:old('centrocosto') }}" readonly class="form-control" placeholder="Indique el centro de costos ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Correo electronico:</strong>
                    <input type="text" name="correoautori" id="correoautori" value="{{ isset($solicitud->correoautori)?$solicitud->correoautori:old('correoautori') }}" class="form-control" placeholder="Indique el correo electronico ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Solicitud realizada por:</strong>
                    <input type="text" name="nombresolici" id="nombresolici" value="{{ isset($solicitud->nombresolici)?$solicitud->nombresolici:old('nombresolici') }}" class="form-control" placeholder="Indique el nombre de la persona que solicita el servicio ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="form-label">Persona que recibe:</strong>
                    <input type="text" name="recoge" id="recoge" value="{{ isset($solicitud->recoge)?$solicitud->recoge:old('recoge') }}" class="form-control" placeholder="Indique el nombre de la persona que recibe">

                    <strong for="dia" class="form-label">Telefono de persona que recibe:</strong>
                    <input type="text" name="telefrecibe" id="telefrecibe" value="{{ isset($solicitud->telefrecibe)?$solicitud->telefrecibe:old('telefrecibe') }}" class="form-control" placeholder="Indique el número de telefono de la persona que recibe">
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

                      <select class="form-control" name="Nombreprove" id="Nombreprove">                      
                        <option class="selectpicker " value="{{ isset($solicitud->Nombreprove)?$solicitud->Nombreprove:old('Nombreprove') }}"> 
                        {{ isset($solicitud->Nombreprove)?$solicitud->Nombreprove:old('Nombreprove') }}                       
                        </option>
                      </select>

                    </div><br>
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
                    </div><br>
                    <div class="col">
                      <strong for="Cargo" class="form-label">Teléfono de contacto 1:</strong>
                      <input type="text" name="telefonouno" value="{{ isset($solicitud->telefonouno)?$solicitud->telefonouno:old('telefonouno') }}" id="telefonouno" class="form-control" placeholder="Digite su cargo" aria-label="Cargo">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="form-label">Nombre de contacto 2:</strong>
                      <input type="text" name="nombrecontactodos" id="nombrecontactodos" class="form-control" value="{{ isset($solicitud->nombrecontactodos)?$solicitud->nombrecontactodos:old('nombrecontactodos') }}" aria-label="Nombre completo">
                    </div><br>
                    <div class="col">
                      <strong for="Cargo" class="form-label">Teléfono de contacto 2:</strong>
                      <input type="text" name="telefonodos" id="telefonodos" class="form-control" value="{{ isset($solicitud->telefonodos)?$solicitud->telefonodos:old('telefonodos') }}">
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
                          <strong class=" text-primary" for="producto" class="form-label">Producto a entregar</strong>
                          <select type="text" name="producto" id="producto" value="" class="form-control">
                            <option value="{{ isset($solicitud->producto)?$solicitud->producto:old('producto') }}">{{ isset($solicitud->producto)?$solicitud->producto:old('producto') }}
                            </option>
                          </select>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-2">
                          <strong class=" text-primary" for="Cantidad" class="form-label">Cantidad</strong>
                          <input type="number" name="cantidad" id="cantidad" value="{{ isset($solicitud->cantidad)?$solicitud->cantidad:old('cantidad') }}" class="form-control">
                        </div>
                        <div class="col-md-2">
                          <strong class=" text-primary" for="hora" class="form-label">Valor unitario</strong>
                          <input type="number" name="valorunid" id="valorunid" value="{{ isset($solicitud->valorunid)?$solicitud->valorunid:old('valorunid') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                          <strong class=" text-primary" for="lugar" class="form-label">Valor total</strong>
                          <input type="number" name="valortota" id="valortota" value="{{ isset($solicitud->valortota)?$solicitud->valortota:old('valortota') }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <strong class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</strong>
                          <input class="form-control" type="text" id="persrecibe" name="persrecibe" value="{{ isset($solicitud->persrecibe)?$solicitud->persrecibe:old('persrecibe') }}">
                        </div>
                      </div>
                      <hr>
                      <!-- .................................................................................................................. -->
                      <div class="container" id="encuestser" style="display:none ;">
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
                            <strong class=" text-primary" for="producto" class="form-label">Producto a entregar</strong>
                            <select type="text" name="productodos" id="productodos" value="{{ isset($solicitud->productodos)?$solicitud->productodos:old('productodos') }}" class="form-control">
                
                              <option value="{{ isset($solicitud->productodos)?$solicitud->productodos:old('productodos') }}">
                          {{ isset($solicitud->productodos)?$solicitud->productodos:old('productodos') }}
                              </option>
                             
                            </select>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
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
                          <div class="col-md-4">
                            <strong class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</strong>
                            <input class="form-control" type="text" id="persrecibedos" name="persrecibedos" value="{{ isset($solicitud->persrecibedos)?$solicitud->persrecibedos:old('persrecibedos') }}">
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
                          <br>
                          <div class="col-md-12 mt-4">
                            <div class="row">
                              <strong class=" text-primary" for="recibe" class="form-label">Por favor autorice o rechace la solicitud.</strong>
                              <select name="estado" id="estado" class="form-control">
                                <option value="{{ isset($solicitud->estado)?$solicitud->estado:old('estado') }}">{{ isset($solicitud->estado)?$solicitud->estado:old('estado') }}</option>
                                <option value="Aceptada">Aceptada</option>
                                <option value="Rechazada">Rechazada</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                <input type="hidden" name="jefe" id="jefe" value="{{ isset($solicitud->jefe)?$solicitud->jefe:old('jefe') }}">
                <input type="hidden" name="id" id="id" value="{{ isset($solicitud->id)?$solicitud->id:old('id') }}">
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