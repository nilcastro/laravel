
<?php $__env->startSection('content'); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php if(Auth::user()->username == $solicitud->jefe): ?>
        <div class="card-header card-header-primary">
          <form action="<?php echo e(url('/autorizacion')); ?>" method="post" enctype="multipart/form-data" id="form1">
            <?php echo csrf_field(); ?>
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
                      <?php if($responses == null): ?>
                      <td>
                        <h3><?php echo e($nada); ?></h3>
                      </td>
                      <?php else: ?>
                      <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <td class="table-"><?php echo e($response['CUENTA']); ?></td>
                      <td class="table-"><?php echo e($response['CUENTA_DESCRIPCION']); ?></td>
                      <td class="table-"><?php echo e(number_format( $response['PPTO_DISPONIBLE'], 0 , ',','.' )); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                  <?php endif; ?>
                </table>
          <?php elseif(Auth::user()->username == $solicitud->autoriza ): ?>
          
        <div class="card-header card-header-primary">
          <form action="<?php echo e(url('/Envioprovee')); ?>" method="post" enctype="multipart/form-data" id="form1">
            <?php echo csrf_field(); ?>
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
                      <?php if($responses == null): ?>
                      <td>
                        <h3><?php echo e($nada); ?></h3>
                      </td>
                      <?php else: ?>
                      <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <td class="table-"><?php echo e($response['CUENTA']); ?></td>
                      <td class="table-"><?php echo e($response['CUENTA_DESCRIPCION']); ?></td>
                      <td class="table-"><?php echo e(number_format( $response['PPTO_DISPONIBLE'], 0 , ',','.' )); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                  <?php endif; ?>
                </table>
              <?php else: ?>
            <form action="<?php echo e(url('/autorizacion')); ?>" method="post" enctype="multipart/form-data" id="form1">
              <?php echo csrf_field(); ?>
              <?php endif; ?>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Información General </h4>
                </div>
                <?php if(count($errors)>0): ?>
                <div class="alert alert-primary" role="alert">
                  <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                <?php endif; ?>
               
            </div>
            <div class="card card-primary">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="col  mt-4">
                    <strong for="dia" class="text-primary" >Fecha de la solicitudes:</strong>
                    <input type="date" name="dia" readonly value="<?php echo e(isset($solicitud->dia)?$solicitud->dia:old('dia')); ?>" class="form-control" placeholder="Fecha del viaje">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="text-primary" >Breve descripción del evento o
                      actividad:</strong>
                    <input type="text" name="description" id="description" value="<?php echo e(isset($solicitud->description)?$solicitud->description:old('description')); ?>" class="form-control" placeholder="Indique la descripción del evento">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Duración de la actividad(Horas):</strong>
                    <input type="number" name="duracion" id="duracion" value="<?php echo e(isset($solicitud->duracion)?$solicitud->duracion:old('duracion')); ?>" class="form-control" placeholder="Indique el número de horas para realizar del evento ">
                  </div>
                  <?php echo e(isset($solicitud->ID_jefe)?$solicitud->ID_jefe:old('ID_jefe')); ?>

                  <div class="col mt-4">
                    <strong for="fechain" class="text-primary" >Fecha inicio de la activiad:</strong>
                    <input type="date" name="fechain" id="fechain" value="<?php echo e(isset($solicitud->fechain)?$solicitud->fechain:old('fechain')); ?>" class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>

                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Fecha fin de la actividad:</strong>
                    <input type="date" name="fechafi" id="fechafi" value="<?php echo e(isset($solicitud->fechafi)?$solicitud->fechafi:old('fechafi')); ?>"  class="form-control" placeholder="Indique las horas de duración del evento ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Asistentes a la actividad:</strong>
                    <input type="text" name="asistente" id="asistente" value="<?php echo e(isset($solicitud->asistente)?$solicitud->asistente:old('asistente')); ?>" class="form-control" placeholder="Indique la cantidad de personas.">
                 
                
                    <strong for="dia" class="text-primary" >Asistentes a la actividad:</strong>
                    <input type="text" name="observAsistente" id="observAsistente" value="<?php echo e(isset($solicitud->observAsistente)?$solicitud->observAsistente:old('observAsistente')); ?>" class="form-control" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col  mt-4">
                    <strong for="dia" class="text-primary" >ID quien autoriza:</strong>
                    <input type="numbre" id="autoriza" name="autoriza" value="<?php echo e(isset($solicitud->autoriza)?$solicitud->autoriza:old('autoriza')); ?>" readonly class="form-control" placeholder="ID de quien autoriza">
                  </div>
                  <div class="col  mt-4">
                    <strong for="dia" class="text-primary" >Nombre de quien autoriza:</strong>
                    <select name="nombreauto" id="nombreauto" class="form-control">
                      <option value="<?php echo e(isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto')); ?>"><?php echo e(isset($solicitud->nombreauto)?$solicitud->nombreauto:old('nombreauto')); ?></option><br>
                    </select>
                  </div>
                  <input type="hidden" name="correoautorizadores" id="correoautorizadores" value="<?php echo e(isset($solicitud->correoautorizadores)?$solicitud->correoautorizadores:old('correoautorizadores')); ?>">
                  <div class="col mt-4">
                    <strong for="dia" class=" text-primary">Nombre unidad que autoriza:</strong>
                    <input type="text" name="unidadAutori" id="unidadAutori" readonly value="<?php echo e(isset($solicitud->unidadAutori)?$solicitud->unidadAutori:old('unidadAutori')); ?>" class="form-control" >
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Nombre de jefe que autoriza:</strong>
                    <input type="text" name="jefeautori" id="jefeautori" readonly value="<?php echo e(isset($solicitud->jefeautori)?$solicitud->jefeautori:old('jefeautori')); ?>" class="form-control" placeholder="Indique el nombre del jefe autorizador ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary">Centro de costos:</strong>
                    <input type="text" name="centrocosto" id="centrocosto" value="<?php echo e(isset($solicitud->centrocosto)?$solicitud->centrocosto:old('centrocosto')); ?>" readonly class="form-control" placeholder="Indique el centro de costos ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Correo electronico:</strong>
                    <input type="text" name="correoautori" id="correoautori" value="<?php echo e(isset($solicitud->correoautori)?$solicitud->correoautori:old('correoautori')); ?>" class="form-control" placeholder="Indique el correo electronico ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Solicitud realizada por:</strong>
                    <input type="text" name="nombresolici" id="nombresolici" value="<?php echo e(isset($solicitud->nombresolici)?$solicitud->nombresolici:old('nombresolici')); ?>" class="form-control" placeholder="Indique el nombre de la persona que solicita el servicio ">
                  </div>
                  <div class="col mt-4">
                    <strong for="dia" class="text-primary" >Persona que recibe:</strong>
                    <input type="text" name="recoge" id="recoge" value="<?php echo e(isset($solicitud->recoge)?$solicitud->recoge:old('recoge')); ?>" class="form-control" placeholder="Indique el nombre de la persona que recibe">

                    <strong for="dia" class="text-primary" >Telefono de persona que recibe:</strong>
                    <input type="text" name="telefrecibe" id="telefrecibe" value="<?php echo e(isset($solicitud->telefrecibe)?$solicitud->telefrecibe:old('telefrecibe')); ?>" class="form-control" placeholder="Indique el número de telefono de la persona que recibe">
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
                        <option class="selectpicker " value="<?php echo e(isset($solicitud->Nombreprove)?$solicitud->Nombreprove:old('Nombreprove')); ?>"> 
                        <?php echo e(isset($solicitud->Nombreprove)?$solicitud->Nombreprove:old('Nombreprove')); ?>                       
                        </option>
                      </select>

                    </div><br>
                    <div class="col">
                      <strong for="correo" class="text-primary" >Correo institucional:</strong>
                      <input type="email" name="Correoelectroni" value="<?php echo e(isset($solicitud->Correoelectroni)?$solicitud->Correoelectroni:old('Correoelectroni')); ?>" class="form-control" id="Correoelectroni" placeholder="Digite su correo instritucional">
                    </div>
                    <div class="col">
                      <strong for="correo" class="text-primary" >Teléfono:</strong>
                      <input type="text" name="Teléfono" value="<?php echo e(isset($solicitud->Teléfono)?$solicitud->Teléfono:old('Teléfono')); ?>" class="form-control" id="Teléfono" placeholder="Digite su teléfono">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="text-primary" >Nombre de contacto 1:</strong>
                      <input type="text" name="nombrecontactouno" id="nombrecontactouno" value="<?php echo e(isset($solicitud->nombrecontactouno)?$solicitud->nombrecontactouno:old('nombrecontactouno')); ?>" class="form-control" placeholder="Ingrese el nombre de contacto" aria-label="Nombre completo">
                    </div><br>
                    <div class="col">
                      <strong for="Cargo" class="text-primary" >Teléfono de contacto 1:</strong>
                      <input type="text" name="telefonouno" value="<?php echo e(isset($solicitud->telefonouno)?$solicitud->telefonouno:old('telefonouno')); ?>" id="telefonouno" class="form-control" placeholder="Digite su cargo" aria-label="Cargo">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col">
                      <strong for="nombre" class="text-primary" >Nombre de contacto 2:</strong>
                      <input type="text" name="nombrecontactodos" id="nombrecontactodos" class="form-control" value="<?php echo e(isset($solicitud->nombrecontactodos)?$solicitud->nombrecontactodos:old('nombrecontactodos')); ?>" aria-label="Nombre completo">
                    </div><br>
                    <div class="col">
                      <strong for="Cargo" class="text-primary" >Teléfono de contacto 2:</strong>
                      <input type="text" name="telefonodos" id="telefonodos" class="form-control" value="<?php echo e(isset($solicitud->telefonodos)?$solicitud->telefonodos:old('telefonodos')); ?>">
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
                          <input type="date" name="fechasoliciuno" id="fechasoliciuno" value="<?php echo e(isset($solicitud->fechasoliciuno)?$solicitud->fechasoliciuno:old('fechasoliciuno')); ?>" class="form-control" class="form-control" aria-label="Cargo">
                        </div>
                        <div class="col-md-2">
                          <strong class=" text-primary" for="hora" class="form-label">Hora</strong>
                          <input type="time" name="horauno" id="horauno" value="<?php echo e(isset($solicitud->horauno)?$solicitud->horauno:old('horauno')); ?>" class="form-control" aria-label="Cargo">
                        </div>
                        <div class="col-md-3">
                          <strong class=" text-primary" for="lugar" class="form-label">Lugar</strong>
                          <input type="text" name="lugaruno" id="lugaruno" value="<?php echo e(isset($solicitud->lugaruno)?$solicitud->lugaruno:old('lugaruno')); ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <strong class=" text-primary" for="producto" class="form-label">Producto a entregar</strong>
                          <select type="text" name="producto" id="producto" value="" class="form-control">
                            <option value="<?php echo e(isset($solicitud->producto)?$solicitud->producto:old('producto')); ?>"><?php echo e(isset($solicitud->producto)?$solicitud->producto:old('producto')); ?>

                            </option>
                          </select>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-md-2">
                        <?php if(Auth::user()->username == $solicitud->username): ?>
                          <strong class=" text-primary" for="Cantidad" class="form-label">Cantidad</strong>
                          <input type="number" name="cantidad" id="cantidad" readOnly value="<?php echo e(isset($solicitud->cantidad)?$solicitud->cantidad:old('cantidad')); ?>" class="form-control">
                          </div>
                        <div class="col-md-2">
                          <strong class=" text-primary" for="hora" class="form-label">Valor unitario</strong>
                          <input type="number" name="valorunid" id="valorunid"readOnly value="<?php echo e(isset($solicitud->valorunid)?$solicitud->valorunid:old('valorunid')); ?>" class="form-control">
                        </div>
                        <div class="col-md-3">
                          <strong class=" text-primary" for="lugar" class="form-label">Valor total</strong>
                          <input type="number" name="valortota" id="valortota"readOnly value="<?php echo e(isset($solicitud->valortota)?$solicitud->valortota:old('valortota')); ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <strong class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</strong>
                          <input class="form-control" type="text" id="persrecibe"readOnly name="persrecibe" value="<?php echo e(isset($solicitud->persrecibe)?$solicitud->persrecibe:old('persrecibe')); ?>">
                        </div>
                        <?php else: ?>
                        <strong class=" text-primary" for="Cantidad" class="form-label">Cantidad</strong>
                          <input type="number" name="cantidad" id="cantidad" readOnly value="<?php echo e(isset($solicitud->cantidad)?$solicitud->cantidad:old('cantidad')); ?>" class="form-control">
                          </div>
                        <div class="col-md-2">
                          <strong class=" text-primary" for="hora" class="form-label">Valor unitario</strong>
                          <input type="number" name="valorunid" id="valorunid" value="<?php echo e(isset($solicitud->valorunid)?$solicitud->valorunid:old('valorunid')); ?>" class="form-control">
                        </div>
                        <div class="col-md-3">
                          <strong class=" text-primary" for="lugar" class="form-label">Valor total</strong>
                          <input type="number" name="valortota" id="valortota" value="<?php echo e(isset($solicitud->valortota)?$solicitud->valortota:old('valortota')); ?>" class="form-control">
                        </div>
                        <div class="col-md-4">
                          <strong class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</strong>
                          <input class="form-control" type="text" id="persrecibe" name="persrecibe" value="<?php echo e(isset($solicitud->persrecibe)?$solicitud->persrecibe:old('persrecibe')); ?>">
                        </div>
                        <?php endif; ?>
                        
  
                      <hr>
                      <!-- .................................................................................................................. -->
                      <div class="container" id="encuestser" style="display:none ;">
                        <div class="row">
                          <div class="col-md-2">
                            <strong class=" text-primary" for="fecha" class="form-label">Fecha</strong>
                            <input type="date" name="fechasolicidos" id="fechasolicidos" value="<?php echo e(isset($solicitud->fechasolicidos)?$solicitud->fechasolicidos:old('fechasolicidos')); ?>" class="form-control" class="form-control" aria-label="Cargo">
                          </div>
                          <div class="col-md-2">
                            <strong class=" text-primary" for="hora" class="form-label">Hora</strong>
                            <input type="time" name="horados" id="horados" value="<?php echo e(isset($solicitud->horados)?$solicitud->horados:old('horados')); ?>" class="form-control" aria-label="Cargo">
                          </div>
                          <div class="col-md-3">
                            <strong class=" text-primary" for="lugar" class="form-label">Lugar</strong>
                            <input type="text" name="lugardos" id="lugardos" value="<?php echo e(isset($solicitud->lugardos)?$solicitud->lugardos:old('lugardos')); ?>" class="form-control">
                          </div>
                          <div class="col-md-4">
                            <strong class=" text-primary" for="producto" class="form-label">Producto a entregar</strong>
                            <select type="text" name="productodos" id="productodos" value="<?php echo e(isset($solicitud->productodos)?$solicitud->productodos:old('productodos')); ?>" class="form-control">
                
                              <option value="<?php echo e(isset($solicitud->productodos)?$solicitud->productodos:old('productodos')); ?>">
                          <?php echo e(isset($solicitud->productodos)?$solicitud->productodos:old('productodos')); ?>

                              </option>
                             
                            </select>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-2">
                            <strong class=" text-primary" for="Cantidad" class="form-label">Cantidad</strong>
                            <input type="number" name="cantidaddos" id="cantidaddos" value="<?php echo e(isset($solicitud->cantidaddos)?$solicitud->cantidaddos:old('cantidaddos')); ?>" class="form-control">
                          </div>
                          <div class="col-md-2">
                            <strong class=" text-primary" for="hora" class="form-label">Valor unitario</strong>
                            <input type="number" name="valoruniddos" id="valoruniddos" value="<?php echo e(isset($solicitud->valoruniddos)?$solicitud->valoruniddos:old('valoruniddos')); ?>" class="form-control">
                          </div>
                          <div class="col-md-3">
                            <strong class=" text-primary" for="lugar" class="form-label">Valor total</strong>
                            <input type="number" name="valortotados" id="valortotados" value="<?php echo e(isset($solicitud->valortotados)?$solicitud->valortotados:old('valortotados')); ?>" class="form-control">
                          </div>
                          <div class="col-md-4">
                            <strong class=" text-primary" for="recibe" class="form-label">Recibe a satisfacción</strong>
                            <input class="form-control" type="text" id="persrecibedos" name="persrecibedos" value="<?php echo e(isset($solicitud->persrecibedos)?$solicitud->persrecibedos:old('persrecibedos')); ?>">
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
                            <?php if(Auth::user()->username == $solicitud->jefe): ?>
                              <h3 class="text-primary" for="recibe" class="form-label">Por favor acepte o rechace la solicitud.</h3>
                           
                              <select name="estado" id="estado" required class="form-control text-danger">
                                
                                <option  value="<?php echo e(isset($solicitud->estado)?$solicitud->estado:old('estado')); ?>"><?php echo e(isset($solicitud->estado)?$solicitud->estado:old('estado')); ?></option>
                             
                                <option class="text-success" value="Aceptada">Aceptar</option>
                                <option value="Rechazada">Rechazar</option>


                            <?php elseif(Auth::user()->username == $solicitud->autoriza): ?>
                                <strong class="text-primary" for="recibe" class="form-label">Estado de la solicitud.</strong>
                           
                                <select name="estado" id="estado" class="form-control">
                                <option value="<?php echo e(isset($solicitud->estado)?$solicitud->estado:old('estado')); ?>"><?php echo e(isset($solicitud->estado)?$solicitud->estado:old('estado')); ?></option>
                                <option value="Rechazar">Rechazar</option>
                            <?php else: ?>
                           
                                <strong class="text-primary" for="recibe" class="form-label">Estado de la solicitud.</strong>
                           
                                <select name="estado" id="estado" class="form-control">
                                <option value="<?php echo e(isset($solicitud->estado)?$solicitud->estado:old('estado')); ?>"><?php echo e(isset($solicitud->estado)?$solicitud->estado:old('estado')); ?></option>
                            
                            <?php endif; ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                <input type="hidden" name="jefe" id="jefe" value="<?php echo e(isset($solicitud->jefe)?$solicitud->jefe:old('jefe')); ?>">
                <input type="hidden" name="email" id="email" value="<?php echo e(isset($solicitud->email)?$solicitud->email:old('email')); ?>">
                <input type="hidden" name="jefenombre" id="jefenombre" value="<?php echo e(isset($solicitud->jefenombre)?$solicitud->jefenombre:old('jefenombre')); ?>">
                <input type="hidden" name="id" id="id" value="<?php echo e(isset($solicitud->id)?$solicitud->id:old('id')); ?>">
                

                <div class="row">
                <?php if(Auth::user()->username == $solicitud->autoriza): ?>
                <?php if( $solicitud->estado == 'Envio a proveedor'): ?>
                  <div class="col-md-2 mr-4">
                    <button class="btn btn-success" type="submit" disabled>Enviar a proveedor</button>
                  </div>
                  <?php endif; ?>
                  <div class="col-md-2 ml-4"> 
                    <a href="<?php echo e(url('solicitud/')); ?>" class="btn btn-primary">Regresar</a>
                  </div>
                
                <?php elseif(Auth::user()->username == $solicitud->username): ?>
                <?php if( $solicitud->estado == 'Envio a proveedor'): ?>
                <div class="col-md-2">
                    <button class="btn btn-success" id="pendientess"   type="submit" disabled>Aceptada</button>
                  </div>
                  <?php endif; ?>
                  <div class="col-md-2 ml-4"> 
                    <a href="<?php echo e(url('solicitud/')); ?>" class="btn btn-primary">Regresar</a>
                  </div>
                 
                <?php else: ?>
                <?php if( $solicitud->estado == 'Envio a proveedor'): ?>
                <div class="col-md-2">
                    <button class="btn btn-success" type="submit" disabled>Aceptada</button>
                    
                  </div>
                  <?php elseif($solicitud->estado == 'Pendiente'): ?>
                  <div class="col-md-2">
                  <button class="btn btn-success" type="submit" >Aceptada</button>
                    
                  </div>
                
                  <?php endif; ?>
                  <div class="col-md-2 ml-4"> 
                    <a href="<?php echo e(url('solicitud/')); ?>" class="btn btn-primary">Regresar</a>
                  </div>
                
                  <?php endif; ?>
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
              url: "<?php echo e(route('ajax.consulta')); ?>",
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
              url: "<?php echo e(route('ajax.register')); ?>",
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
              url: "<?php echo e(route('ajax.product')); ?>",
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
              url: "<?php echo e(route('ajax.product')); ?>",
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
<?php echo $__env->make('layouts.main', ['activePage' => 'autorizacion', 'titlePage' => __('Autorización')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/autorizacion/edit.blade.php ENDPATH**/ ?>