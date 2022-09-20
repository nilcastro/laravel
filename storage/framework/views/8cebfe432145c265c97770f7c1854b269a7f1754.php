
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <form action="<?php echo e(url('/solicitud')); ?>" method="post" enctype="multipart/form-data" id="form1">
          <?php echo csrf_field(); ?>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Información general </h4>
            </div>
            <?php if(count($errors)>0): ?>
            <div class="alert alert-primary" role="alert">
              <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            <?php endif; ?>
            <div class="card card-primary" >
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
                      
                      <?php $__currentLoopData = $autorizas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autoriza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <option value="<?php echo e($autoriza->name); ?>"><?php echo e($autoriza->name); ?> <?php echo e($autoriza->apellidos); ?></option><br>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <input type="hidden" name="correoautorizadores" id="correoautorizadores" value="">
                    <input type="hidden" name="id" id="id" value="">
                      <div class="col-md-12 mt-4" >
                          <select name="profesional" id="profesional" class="form-control">

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
                    <input type="text" name="nombresolici" id="nombresolici" value="<?php echo e(Auth::user()->name); ?><?php echo e(Auth::user()->apellidos); ?>" class="form-control" placeholder="Indique el nombre de la persona que solicita el servicio ">
                    <input type="hidden" name="username" id="username" value="<?php echo e(Auth::user()->username); ?>">
                  </div>
                  <div class="col mt-4">
                    <label for="dia" class=" text-primary">Centro de costos:</label>
                    <input type="text" name="centrocosto" id="centrocosto" value="<?php echo e(Auth::user()->programa); ?>"  class="form-control" placeholder="Indique el centro de costos ">
                  </div>
                  <div class="col mt-4">
                    <label for="dia" class=" text-primary">Observación del centro de costos:</label>
                    <input type="text" name="observCentrocosto" id="observCentrocosto" value=""  class="form-control" placeholder="Indique el centro de costos ">
                  </div>
                  <div class="col mt-4">
                    <label for="dia" class=" text-primary">Correo electronico:</label>
                    <input type="text" name="correoautori" id="correoautori" value="<?php echo e(Auth::user()->email); ?>" class="form-control" placeholder="Indique el correo electronico ">
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
                      <label for="nombre" class=" text-primary">Nombre del concesionario o proveedor:</label>
                        <select class="form-control selectpicker" required name="Nombreprove" id="Nombreprove" data-style="text-dark"
                            title="Seleccione el proveedor">
                          <option value=""></option>
                          <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option class="selectpicker" value="<?php echo e($proveedore->id); ?>">
                            <?php echo e($proveedore->nombreProvee); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <div class="col-md-4" >
                          <label class=" text-primary"  class="form-label">Producto a entregar</label>
                          <select  name="producto" id="producto" required class="form-control">
                                 
                          </select>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-2">
                          <label class=" text-primary" for="Cantidad" class="form-label">Cantidad</label>
                          <input type="number" name="cantidad" id="cantidad" required value="" class="form-control">
                        </div>
                        <div class="col-md-2">
                          <label class=" text-primary"  class="form-label">Valor unitario</label>
                          <input type="number" name="valorunid" id="valorunid" value="" class="form-control">
                        </div>
                        <div class="col-md-3">
                          <label class=" text-primary" for="lugar" class="form-label">Valor total</label>
                          <input type="number" name="valortota" id="valortota" value="" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <label class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</label>
                          <input class="form-control" type="text" id="persrecibe" name="persrecibe" value="">
                        </div>
                        <div class="col-md-8 mt-4">
                          <label class=" text-primary" for="recibe" class="form-label">Observaciónes del pedido </label>
                          <input class="form-control" type="textarea" id="observacion" name="observacion" value=""
                          placeholder="Pequeña observación adicional sobre el pedido  ">
                        </div>
                      </div>
                     
                      <!-- .................................................................................................................. -->
                      <div class="container" id="encuestser" style="display:none ;">
                        <div class="row">
                          <div class="col-md-2">
                            <label class=" text-primary" for="fecha" class="form-label">Fecha</label>
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
                              <label class=" text-primary" for="producto" class="form-label">Producto a entregar</label>
                              <select type="text" name="productodos" id="productodos" value="" class="form-control">
                                  <option value="">--Selecciona un producto</option>
                                  <?php $__empty_1 = true; $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                  <option value="<?php echo e($producto->id); ?>">
                                    <?php echo e($producto->nombreProduc); ?>

                                  </option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                  <option value="">--Selecciona un producto</option>
                                  <?php endif; ?>
                              </select>                      
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-2">
                            <label class=" text-primary" for="Cantidad" class="form-label">Cantidad</label>
                            <input type="number" name="cantidaddos" id="cantidaddos" value="" class="form-control">
                          </div>
                          <div class="col-md-2">
                            <label class=" text-primary" for="hora" class="form-label">Valor unitario</label>
                            <input type="number" name="valoruniddos" id="valoruniddos" value="" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <label class=" text-primary" for="lugar" class="form-label">Valor total</label>
                            <input type="number" name="valortotados" id="valortotados" value="" class="form-control">
                          </div>
                          <div class="col-md-4">
                            <label class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</label>
                            <input class="form-control" type="text" id="persrecibedos" name="persrecibedos" value="">
                          </div>
                        </div>
                      </div>

                      <hr>
                      <div class="col-md-3">
                        <div class="row">
                          <label class=" text-primary" for="recibe" class="form-label">¿Desea pedir mas de un producto?</label>
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
                <input type="hidden" name="estado" id="estado" value="Pendiente">
                <input type="hidden" name="email_jefe" id="email_jefe" value="<?php echo e(Auth::user()->email_jefe); ?>">
                <input type="hidden" name="email" id="email" value="<?php echo e(Auth::user()->email); ?>">
                <input type="hidden" name="jefe" id="jefe" value="<?php echo e(Auth::user()->jefe); ?>">
                <input type="hidden" name="jefenombre" id="jefenombre" value="<?php echo e(Auth::user()->nombre_jefe); ?> <?php echo e(Auth::user()->apellido_jefe); ?>">
                <div class="row">
                  <div class="col-md-2">
                    <button class="btn btn-success" type="submit">Enviar Solicitud</button>
                  </div> <br>
                  <div class="col"> <a href="<?php echo e(url('solicitud/')); ?>" class="btn btn-primary">Regresar</a></div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
     
      <?php $__env->stopSection(); ?>
      <?php $__env->startSection('js'); ?>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
      <!-- <script src="<?php echo e(asset('js/main/eventos.js')); ?>"></script> -->
      <?php $__env->stopSection(); ?>
      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
      <script src="<?php echo e(asset('js/main/eventos.js')); ?>"></script>
      <script src="<?php echo e(asset('js/main/profesional.js')); ?>"></script>
      <script>
     
        $(document).ready(function() {

          // alert("hola");
          $("#mas").on('change', function() {
            let bueno = $("#mas").val();
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
            let bueno = $("#mas").val();
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
// lo ewstoy pasdasndo a profesional 
        $(document).ready(function() {
          $("#nombreauto").on('change', function() {
            let si = $("#nombreauto").val();
            let url = $(this).attr('action')
            $.ajax({
              url: "<?php echo e(route('ajax.consulta')); ?>",
              type: 'POST',
              data: $("#form1").serialize(),
            }).done(function(res) {
              $jefe = res[0].nombre_jefe + res[0].apellido_jefe
              
             
              document.getElementById("autoriza").value = res[0].username;
              document.getElementById("jefeautori").value = $jefe;
              document.getElementById("correoautorizadores").value = res[0].email;
              document.getElementById("unidadAutori").value = res[0].nombre_centroc;
              document.getElementById("id").value = res[0].id;

            })                  
          });

        });


        $(document).ready(function() {
          $("#Nombreprove").on('change', function() {
            let s = $("#Nombreprove").val();
             console.log(s);
            let url = $(this).attr('action')
            $.ajax({
              url: "<?php echo e(route('ajax.register')); ?>",
              type: 'POST',
              data: $("#form1").serialize(),
            }).done(function(res) {
              pruductos = res[0].nombreProduc;
                precios = res[0].precio;
                console.log(res);
                document.getElementById("id").value = res[0].id;
                document.getElementById("Correoelectroni").value = res[0].correoProvee;
                document.getElementById("Teléfono").value = res[0].telProvee;
                document.getElementById("nombrecontactouno").value = res[0].nombreContac;
                document.getElementById("telefonouno").value = res[0].telProvee;
                document.getElementById("nombrecontactodos").value = res[0].nombrecontactodos;
                document.getElementById("telefonodos").value = res[0].telefonodos;
                $("#producto").empty();
                $("#valorunid").empty();
                $("#producto").append('<option class="form-control" value=""> Selecciona un producto</option>');
                for(let i=0; i<res.length; ++i){
                  let html_select ='<option value="">Seleccione producto</option';
                  $("#producto").append(
                    '<option class="form-control" value="'+res[i].id+'">'+res[i].nombreProduc+'</option>');
                }
              })
            })
           
          });
          $(document).ready(function() {
          $("#producto").on('change', function() {
            let s = $("#producto").val();
          
              console.log(s);
              var url = $(this).attr('action')
              $.ajax({
                url: "<?php echo e(route('ajax.product')); ?>",
                type: 'POST',
                data: $("#form1").serialize(),
              }).done(function(res) {
                
                console.log("Producto DB", res);
                 let obj = res;
                 $("#valorunid").val(res[0].precio);
                 
              });               
            })
          });

        $(document).ready(function() {
          $("#cantidad").on('change', function() {
            var s = $("#cantidad").val();
            //console.log(s);
            $("#valortota").empty();
            let canti = document.getElementById("cantidad").value;
            let precio = document.getElementById("valorunid").value;
            document.getElementById("valortota").value = canti * precio;

          });

        });

      // esat repetida
        // $(document).ready(function() {
        //   $("#cantidad").on('change', function() {
        //     var s = $("#cantidad").val();
        //     //console.log(s);
        //     let canti = document.getElementById("cantidad").value;
        //     let precio = document.getElementById("valorunid").value;
        //     document.getElementById("valortota").value = canti * precio;

        //   });

        // });

      </script>
<?php echo $__env->make('layouts.main', ['activePage' => 'solicitud', 'titlePage' => __('Solicitud')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/solicitud/create.blade.php ENDPATH**/ ?>