
    $(document).ready(function() {
        
    let nombreaut = document.getElementById("nombreauto");

    nombreaut.addEventListener("change",autorizador,false);

    function autorizador(){
       
        let si = nombreaut.value;
        
        let url = $(this).attr('action')
        $.ajax({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
          },
            url: "ajax.consulta",
            type: 'POST',
            data:{'name': si} ,
          }).done(function(res) {
         
            $jefe = res[0].nombre_jefe + res[0].apellido_jefe       
            document.getElementById("autoriza").value = res[0].username;
            document.getElementById("jefeautori").value = $jefe;
            document.getElementById("correoautorizadores").value = res[0].email;
            document.getElementById("unidadAutori").value = res[0].nombre_centroc;
            document.getElementById("ids").value = res[0].id;
          })   
     }
   
});

   
