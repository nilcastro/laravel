
<div class="content">
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-md-12">
                <div class="card">
                 
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="bodys">
                                <thead class=" text-primary">
                                    <tr> 
                                        <th>Fecha</th>
                                        <th>Descripción</th>
                                        <th>Duración</th>
                                        <th>Fecha inicial</th>
                                        <th>Fecha final</th>
                                        <th>Asistentes</th>
                                        <th>Observación asistentes</th>
                                        <th>ID Autoriza</th>
                                        <th>Nombre autoriza</th>
                                        <th>Correo autorizador</th>
                                        <th>Unidad autorizadora</th>
                                        <th>Jefe autorizador</th>
                                        <th>Centro de costo</th>
                                        <th>Observ. Centro de costo</th>
                                        <th>ID solicitante</th>
                                        <th>Solicitante</th>
                                        <th>Correo solicitante</th>
                                        <th>ID Jefe del solicitante</th>
                                        <th>Nombre Jefe del solicitante</th>
                                        <th>Correo del jefe</th>
                                        <th>Nombre profesional</th>
                                        <th>Persona que Recoge</th>
                                        <th>Nombre proveedor </th>
                                        <th>Correo electronico proveedor</th>
                                        <th>Teléfono</th>
                                        <th>Fecha entrega</th>
                                        <th>Hora entrega</th>
                                        <th>Lugar entrega</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Valor</th>
                                        <th>Total</th>
                                        <th>Fecha entrega dos</th>
                                        <th>Hora entrega dos</th>
                                        <th>Lugar entrega dos</th>
                                        <th>Producto dos</th>
                                        <th>Cantidad dos</th>
                                        <th>Valor dos</th>
                                        <th>Total dos</th>
                                        <th>Fecha entrega tres</th>
                                        <th>Hora entrega tres</th>
                                        <th>Lugar entrega tres</th>
                                        <th>Producto tres</th>
                                        <th>Cantidad tres</th>
                                        <th>Valor tres</th>
                                        <th>Total tres</th>
                                        <th>Fecha entrega cuatrto</th>
                                        <th>Hora entrega cuatrto</th>
                                        <th>Lugar entrega cuatrto</th>
                                        <th>Producto cuatrto</th>
                                        <th>Cantidad cuatrto</th>
                                        <th>Valor cuatrto</th>
                                        <th>Total cuatrto</th>
                                        <th>Fecha entrega cinco</th>
                                        <th>Hora entrega cinco</th>
                                        <th>Lugar entrega cinco</th>
                                        <th>Producto cinco</th>
                                        <th>Cantidad cinco</th>
                                        <th>Valor cinco</th>
                                        <th>Total cinco</th>
                                        <th>Total tactura</th>
                                        <th>Estado</th>
                                        <th>Observación estado</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
                                    <tr ></tr>
                                    <?php $__currentLoopData = $reportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr >
                                        <td><?php echo e($solicitu->dia); ?></td>
                                        <td><?php echo e($solicitu->description); ?></td>
                                        <td><?php echo e($solicitu->duracion); ?></td>
                                        <td><?php echo e($solicitu->fechain); ?></td>
                                        <td><?php echo e($solicitu->fechafi); ?></td>
                                        <td><?php echo e($solicitu->asistente); ?></td>
                                        <td><?php echo e($solicitu->observacion); ?></td>
                                        <td><?php echo e($solicitu->autoriza); ?></td>
                                        <td><?php echo e($solicitu->nombreauto); ?></td>
                                        <td><?php echo e($solicitu->correoautori); ?></td>
                                        <td><?php echo e($solicitu->unidadAutori); ?></td>
                                        <td><?php echo e($solicitu->jefenombre); ?></td>
                                        <td><?php echo e($solicitu->centrocosto); ?></td>
                                        <td><?php echo e($solicitu->observCentrocosto); ?></td> 
                                        <td><?php echo e($solicitu->username); ?></td>
                                        <td><?php echo e($solicitu->nombresolici); ?></td>
                                        <td><?php echo e($solicitu->email); ?></td>
                                        <td><?php echo e($solicitu->jefe); ?></td>
                                        <td><?php echo e($solicitu->jefeautori); ?></td>
                                        <td><?php echo e($solicitu->email_jefe); ?></td>
                                        <td><?php echo e($solicitu->profesional); ?></td>
                                        <td><?php echo e($solicitu->recoge); ?></td>
                                        <td><?php echo e($solicitu->Nombreprove); ?></td>
                                        <td><?php echo e($solicitu->Correoelectroni); ?></td>
                                        <td><?php echo e($solicitu->Teléfono); ?></td>
                                        <td><?php echo e($solicitu->fechasoliciuno); ?></td>
                                        <td><?php echo e($solicitu->horauno); ?></td>
                                        <td><?php echo e($solicitu->lugaruno); ?></td>
                                        <td><?php echo e($solicitu->producto); ?></td>
                                        <td><?php echo e($solicitu->cantidad); ?></td>
                                        <td><?php echo e($solicitu->valortota); ?></td>
                                        <td><?php echo e($solicitu->fechasolicidos); ?></td>
                                        <td><?php echo e($solicitu->horados); ?></td>
                                        <td><?php echo e($solicitu->lugardos); ?></td>
                                        <td><?php echo e($solicitu->productodos); ?></td>
                                        <td><?php echo e($solicitu->cantidaddos); ?></td>
                                        <td><?php echo e($solicitu->valoruniddos); ?></td>
                                        <td><?php echo e($solicitu->valortotados); ?></td>
                                        <td><?php echo e($solicitu->fechasolicitres); ?></td>
                                        <td><?php echo e($solicitu->horatres); ?></td>
                                        <td><?php echo e($solicitu->lugartres); ?></td>
                                        <td><?php echo e($solicitu->productotres); ?></td>
                                        <td><?php echo e($solicitu->cantidatres); ?></td>
                                        <td><?php echo e($solicitu->valorunidtres); ?></td>
                                        <td><?php echo e($solicitu->valortotatres); ?></td>
                                        <td><?php echo e($solicitu->fechasolicicuatro); ?></td>
                                        <td><?php echo e($solicitu->horacuatro); ?></td>
                                        <td><?php echo e($solicitu->lugarcuatro); ?></td>
                                        <td><?php echo e($solicitu->horacuatro); ?></td>
                                        <td><?php echo e($solicitu->productocuatro); ?></td>
                                        <td><?php echo e($solicitu->cantidadcuatro); ?></td>
                                        <td><?php echo e($solicitu->valorunidcuatro); ?></td>
                                        <td><?php echo e($solicitu->valortotacuatro); ?></td>
                                        <td><?php echo e($solicitu->fechasolicicinco); ?></td>
                                        <td><?php echo e($solicitu->horacinco); ?></td>
                                        <td><?php echo e($solicitu->lugarcinco); ?></td>
                                        <td><?php echo e($solicitu->productocinco); ?></td>
                                        <td><?php echo e($solicitu->cantidadcinco); ?></td>
                                        <td><?php echo e($solicitu->valortotacinco); ?></td>
                                        <td><?php echo e($solicitu->valortotalfinal); ?></td>
                                        <td><?php echo e($solicitu->valortotalfinal); ?></td>
                                        <td><?php echo e($solicitu->estado); ?></td>
                                        <td><?php echo e($solicitu->observacionincomplet); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/autorizacion/reportView.blade.php ENDPATH**/ ?>