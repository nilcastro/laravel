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

$(document).ready(function() {
  // alert("hola");
  $("#nombreauto").on('change', function() {
    let si = $("#nombreauto").val();
    console.log(si);
    let url = $(this).attr('action')
    $.ajax({
      url: "{{ route('ajax.consulta')}}",
      type: 'POST',
      data: $("#form1").serialize(),
    }).done(function(res) {
      $jefe = res[0].nombre_jefe + res[0].apellido_jefe
      // alert($jefe)
      document.getElementById("autoriza").value = res[0].username;
      document.getElementById("jefeautori").value = $jefe;
      document.getElementById("correoautorizadores").value = res[0].email;
    })
  });

});


$(document).ready(function() {

  //alert("hola");
  $("#Nombreprove").on('change', function() {
    let s = $("#Nombreprove").val();
    // console.log(s);
    let url = $(this).attr('action')
    $.ajax({
      url: "{{ route('ajax.register')}}",
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
       
        for(let i=0; i<res.length; ++i){
          let html_select ='<option value="">Seleccione producto</option';
          $("#producto").append('<option class="form-control" value="'+res[i].nombreProduc+'">'+res[i].nombreProduc+'</option>');
          // $("#valorunid").val(res[i].precio);
         
          // $("#producto").on('change', function() {
          //   let s = $("#producto").val();
          
          //   //alert("hola");
          //   console.log(s);
          
          //   $("#valorunid").empty();
          //       $("#valorunid").val(res[i].precio);       
          // })
      
        }
      
      })
    })
  });

// $(document).ready(function() {

// //alert("hola");
// $("#producto").on('change', function() {
//   let s = $("#producto").val();
//    let p = $("#Nombreprove").val()
//    let i = $("#id").val()
//   //alert("hola");
//   console.log(i);
//   var url = $(this).attr('action')
//   $.ajax({
//     url: "{{ route('ajax.product')}}",
//     type: 'POST',
//     data: $("#form1").serialize(),
//   }).done(function(res) {
//       console.log(res);
//       $("#valorunid").val(res);
  
//   });               
// })
// });



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


$(document).ready(function() {
  $("#cantidad").on('change', function() {
    var s = $("#cantidad").val();
    //console.log(s);
    let canti = document.getElementById("cantidad").value;
    let precio = document.getElementById("valorunid").value;
    document.getElementById("valortota").value = canti * precio;

  });

});
