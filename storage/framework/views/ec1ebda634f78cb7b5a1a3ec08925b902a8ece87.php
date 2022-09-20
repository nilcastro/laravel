
<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de solicitudes</h4>
                        <p class="card-category"> todas las solicitudes </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="bodys">
                                <thead class=" text-primary">
                                    <tr>
                                       
                                        <th>Autoriza</th>
                                        <th>Solicitante </th>
                                        <th>Horas </th>
                                        <th>Lugar </th>
                                        <th>Proveedor</th>
                                        <th>Fecha evento</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
                                    <tr ></tr>
                                    <?php $__currentLoopData = $solicitud; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr >
                                  
                                      
                                        <td><?php echo e($solicitu->nombreauto); ?></td>
                                        <td><?php echo e($solicitu->nombresolici); ?></td>
                                        <td><?php echo e($solicitu->duracion); ?></td>
                                        <td><?php echo e($solicitu->lugaruno); ?></td>
                                        <td><?php echo e($solicitu->Nombreprove); ?></td>
                                        <td class="text-primary"><?php echo e($solicitu->fechain); ?></td>
                                       
                                       <?php if( $solicitu->estado == "Pendiente" && Auth::user()->username == $solicitu->autoriza ): ?>
                                       <td  class="text-danger"><a href="#" class="btn btn-danger" disabled><?php echo e($solicitu->estado); ?></td>
                                       <?php elseif( $solicitu->estado == "Pendiente" && Auth::user()->username == $solicitu->jefe): ?>
                                       <td  class="text-danger"><a href="<?php echo e(route('autorizacion.edit',$solicitu->id)); ?>" class="btn btn-danger"><?php echo e($solicitu->estado); ?></td>
                                       <?php elseif($solicitu->estado == "Aceptada"): ?>
                                       <td  class="text-"><a href="<?php echo e(route('autorizacion.edit',$solicitu->id)); ?>" class="btn btn-warning"><?php echo e($solicitu->estado); ?></td>
                                       <?php else: ?> <td  class="text-"><a href="<?php echo e(route('autorizacion.edit',$solicitu->id)); ?>" class="btn btn-success"><?php echo e($solicitu->estado); ?></td>
                                       <?php endif; ?>
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
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
      </script>
   
    <script>
// $(document).ready(function(){

//     $("#btnBuscar").on('click', function() {
//         const strCadena = $("#buscar").val();
//         console.log(strCadena);
//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             url: "search",
//             type: 'POST',
//             data: {'name': strCadena},
//         }).done(function(res) {
//             //Here catch string and update table information
//             let solicitud = res[0];
            
           
          
//             if(res){
//                 for(let i=0; i<res.length; ++i){
//                   let html_select = `<td>`+res[i].dia`</td><td>`res[i].nombreauto`</td>`;
//                   $("#tabla").append(
//                     conole.log("holaaaa")
//                     document.getElementById("tabla").innerHTML= `<td>`+res[i].dia`</td><td>`res[i].nombreauto`</td>`;
//         )}
             
//               }

//         })
//     });
// });
//     </script>
    <?php $__env->stopSection(); ?>
   
<?php echo $__env->make('layouts.main', ['activePage' => 'Autorizacion', 'titlePage' => __('Autorizacion')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/autorizacion/index.blade.php ENDPATH**/ ?>