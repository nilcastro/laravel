// $(document).ready(function(){
   
//     $("#btnBuscar").on('click', function() {
//         const strCadena = $("#buscar").val();
//             if(strCadena == null){
//                 alert("no hay ")
//             }
//          console.log(strCadena);
//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             url:"search",
//             type: 'POST',
//             data: {'name': strCadena},
//         }).done(function(si) {
//             //Here catch string and update table information
          
//                 console.log(si);
//                 let tbody = document.getElementById('tables');
                   
//                 for(let i = 0; i <si.length; i++) {
                   
//                     let html_select = `<td>`+si[i].nombreauto+`</td><td>`+si[i].nombresolici+`</td><td>`+si[i].duracion+`</td>
//                     <td>`+si[i].lugaruno+`</td><td>`+si[i].Nombreprove+`</td><td>`+si[i].producto+`</td>
//                     <td>`+si[i].cantidad+`</td><td>`+si[i].valortota+`</td><td>`+si[i].fechain+`</td><td>`+si[i].estado+`</td>`
//                     tbody.innerHTML = html_select
                    
//                    }
                
//     });
// });
// });