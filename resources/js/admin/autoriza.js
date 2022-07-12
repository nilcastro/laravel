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
      document.getElementById("autoriza").value= res[0].username;
      document.getElementById("jefeautori").value= $jefe;
      document.getElementById("centrocosto").value= res[0].programa;
    }) 
  });
