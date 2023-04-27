<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <strong>Solicitud para <?php echo e($solicitud['description']); ?>

        para la fecha <?php echo e($solicitud['fechasoliciuno']); ?> 
        solicitado por <?php echo e($solicitud['nombresolici']); ?></strong>


    <p>Tienes una solicitud de refrigerios autorizada  esperando a ser aceptada.</p>
       <strong>Caracteristicas del pedido</strong>
       <ul>
        <li><strong>Persona que autoriza:</strong> <?php echo e($solicitud['nombreauto']); ?></li>
        <li><strong>Nombre solicitante:</strong> <?php echo e($solicitud['nombresolici']); ?></li>
        <li><strong>Centro de costos del solicitante:</strong>  <?php echo e($solicitud['centrocosto']); ?> </li>
        <li><strong>Descripción del evento:</strong> <?php echo e($solicitud['description']); ?></li>
        <li><strong>Fecha del evento:</strong> <?php echo e($solicitud['fechain']); ?>  </li>
        <li><strong>Hora del evento:</strong> <?php echo e($solicitud['horauno']); ?></li>
        <li><strong>Lugar del evento:</strong> <?php echo e($solicitud['lugaruno']); ?></li>
        <li><strong>Productos solicitados:</strong> <?php echo e($solicitud['producto']); ?> </li>
        <li><strong>Cantidad:</strong><?php echo e($solicitud['cantidad']); ?></li>
        <li><strong>Persona que recibe:</strong> <?php echo e($solicitud['persrecibe']); ?> </li>
        <li><strong>Telefono de persona que recibe:</strong> <?php echo e($solicitud['telefrecibe']); ?></li>
       </ul>
        
       <p>Por favor comunicarse con la persona autorizada ante el proveedor <?php echo e($solicitud['nombreauto']); ?> y confirmar el pedido </p>

       <strong>Nota:</strong>
       <p>Una vez prestado el servicio, se solicita enviar la factura de manera inmediata al correo electrónico:  
       <strong>facturacion.gestiondocumentalmed@upb.edu.co</strong>
        
       Por favor indicar el nombre de la persona que solicitó 
       el servicio, Unidad donde labora y relacionar el centro de costos.</p>
         
</body>
</html><?php /**PATH C:\xampp\htdocs\refrigerios\resources\views/emails/envioprovee.blade.php ENDPATH**/ ?>