// $(document).ready(function() {
//     let produc = document.getElementById("producto");
//     let producdos = document.getElementById("productodos");
//     let productres = document.getElementById("productotres");
//     let produccuatro = document.getElementById("productocuatro");
//     let produccinco = document.getElementById("productocinco");

//     produc.addEventListener("change",productouno, false);
//     producdos.addEventListener("change",productodos,false);
//     productres.addEventListener("change",productotres,false);
//     produccuatro.addEventListener("change",productocuatro,false);
//     produccinco.addEventListener("change",productocinco,false);

//    function productouno(){
//     // let s = $("#producto").val();
//     let ss = document.getElementById("producto");
//     let s = ss.value;
//     console.log(s);

    
   

//     $.ajax({
//         headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
//       },
//         url: "ajax.product",
//         type: 'post',
//         data: {'id': s},
//     }).done(function(res) {
//       console.log(res);
//       console.log("Producto DB", res);
//        let obj = res;
//        $("#valorunid").val(res[0].precio);
//     }); 
        
//    }
   
//    function productodos(){
   
//         let s = $("#productodos").val();
      
//           console.log(s);
       
//           $.ajax({
//             headers: {
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
//           },
//             url: "ajax.product",
//             type: 'get',
//             data: {'id': s},
//           }).done(function(res) {
            
//             console.log("Producto DB", res);
//              let obj = res;
//              $("#valoruniddos").val(res[0].precio);
             
            
//         })
//    }
   
//    function productotres(){
   
//     let s = $("#productotres").val();
  
//       console.log(s);

//       $.ajax({
//         headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
//       },
//         url: "ajax.product",
//         type: 'get',
//         data: {'id': s},
//       }).done(function(res) {
        
//         console.log("Producto DB", res);
//          let obj = res;
//          $("#valorunidtres").val(res[0].precio);
         
                   
//     })
//     }

//     function productocuatro(){
//         let s = $("#productocuatro").val();
      
//           console.log(s);
       
//           $.ajax({
//             headers: {
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
//           },
//             url: "ajax.product",
//             type: 'get',
//             data: {'id': s},
//           }).done(function(res) {
            
//             console.log("Producto DB", res);
//              let obj = res;
//              $("#valorunidcuatro").val(res[0].precio);
             
                       
//         })
//     }

//     function productocinco(){
//         let s = $("#productocinco").val();
      
//           console.log(s);
      
//           $.ajax({
//             headers: {
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
//           },
//             url: "ajax.product",
//             type: 'get',
//             data: {'id': s},
//           }).done(function(res) {
            
//             console.log("Producto DB", res);
//              let obj = res;
//              $("#valorunidcinco").val(res[0].precio);             
//         })
//     }
    
//  })
  
$(document).ready(function() {
  let productos = [
    { id: "producto", valor: "valorunid" },
    { id: "productodos", valor: "valoruniddos" },
    { id: "productotres", valor: "valorunidtres" },
    { id: "productocuatro", valor: "valorunidcuatro" },
    { id: "productocinco", valor: "valorunidcinco" }
  ];

  productos.forEach(function(producto) {
    document.getElementById(producto.id).addEventListener("change", function() {
      
      let id = $(this).val();
      getProduct(id, producto.valor);
    });
  });

  function getProduct(id, valor) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
      },
      url: "ajax.product",
      type: 'post',
      data: { 'id': id }
    }).done(function(res) {
      console.log("Producto DB", res);
      $("#" + valor).val(res[0].precio);
    });
  }
});