<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <strong>Solicitud para {{ $solicitud['description']}}
        para la fecha {{$solicitud['fechasoliciuno']}} 
        solicitado por {{$solicitud['nombresolici']}}</strong>


    <p>Tienes una solicitud de refrigerios autorizada  esperando a ser aceptada.</p>
       <strong>Caracteristicas del pedido</strong>
       <ul>
        <li><strong>Persona que autoriza:</strong> {{ $solicitud['nombreauto'] }}</li>
        <li><strong>Nombre solicitante:</strong> {{ $solicitud['nombresolici'] }}</li>
        <li><strong>Centro de costos del solicitante:</strong>  {{ $solicitud['centrocosto'] }} </li>
        <li><strong>Descripción del evento:</strong> {{ $solicitud['description'] }}</li>
        <li><strong>Fecha del evento:</strong> {{ $solicitud['fechain'] }}  </li>
        <li><strong>Hora del evento:</strong> {{ $solicitud['horauno'] }}</li>
        <li><strong>Lugar del evento:</strong> {{ $solicitud['lugaruno'] }}</li>
        <li><strong>Productos solicitados:</strong> {{ $solicitud['producto'] }} </li>
        <li><strong>Cantidad:</strong>{{ $solicitud['cantidad'] }}</li>
        <li><strong>Persona que recibe:</strong> {{ $solicitud['persrecibe'] }} </li>
        <li><strong>Telefono de persona que recibe:</strong> {{ $solicitud['telefrecibe'] }}</li>
       </ul>
        
       <p>Por favor comunicarse con la persona autorizada ante el proveedor {{ $solicitud['nombreauto'] }} y confirmar el pedido </p>

       <strong>Nota:</strong>
       <p>Una vez prestado el servicio, se solicita enviar la factura de manera inmediata al correo electrónico:  
       <strong>facturacion.gestiondocumentalmed@upb.edu.co</strong>
        
       Por favor indicar el nombre de la persona que solicitó 
       el servicio, Unidad donde labora y relacionar el centro de costos.</p>
         
</body>
</html>