

// $(document).ready(function() {

// let btnBus= document.getElementById("btnbuscar");
// let txtBus= document.getElementById("txtBuscar");
// // keyup para escuchar cada letra
// btnBus.addEventListener("click",buscarProveedor,false);



//  function buscarProveedor(){

//     let data = txtBus.value;
//     const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//     // console.log(token);
//     url = $(this).attr('action')
//     let dat = $('#txtBuscar').val();
//      console.log('dat')
//     // $.ajaxSetup(
//     //     {
//     //         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
//     //     }
//     // )
//     $.ajax({
//         type: 'POST',
//         dataType: 'json',
//         //url: 'solicitud.buscador',
//         url:'solicitud/buscador',
//         data: {
//             'txtBuscar': dat
//         },
      
//         success: function (data) {
//            console.log('ok!');
//         },
//         error: function (jqXHR) {
//             console.log('casi !');
//         }
//     });







//     // fetch('solicitud/buscador',{
//     //     method:'POST',
//     //     headers: {
//     //         'Content-Type': 'application/json',
//     //         'Accept': 'application/json',
//     //         'url': 'solicitud/buscador',
//     //         "X-CSRF-Token": token,
//     //     }
//     // })
//     // .then(
//     //     response => response.json()
//     // )
//     // .then(function(solicitud){
//     //     console.info(solicitud);
       
//     // })
//     // .catch(function (error) {
//     //     console.error(error);
//     // })
//     /*fetch( url,{
//         headers:{
//             'Content-Type': 'application/json', 
//             'Accept': 'application/json',
//             'url': '/buscador',
//              },
//         method:'POST',
//         body: JSON.stringify(data)
//     })
//     .then(response => response.json())
  
//     .then(function(solicitud){
//         alert(solicitud);
//     })
//     .catch(function (error) {
//       console.log(error);
//     });*/
//   }

// });

   
  
     
   