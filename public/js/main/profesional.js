
$(document).ready(function() {

let nombre = document.getElementById("nombreauto");
let profesi= document.getElementById("profesional");

nombre.addEventListener("change",profesion,false)
profesi.addEventListener("change",centroCprof,false)


  function profesion(){
    
    setTimeout(() => {
      let date1=nombre.value
      let ident= document.getElementById("ids").value;
      const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      
     
      if(ident == 12){
        let div = document.getElementById("prosionaldiv");
        div.style.display = "block";
        if((ident.length)>1)
          fetch("profes",{
            method: 'get'
        })
          .then(response => response.json())      
          .then(data => {
            
          let profes = document.getElementById("profesional");
          
          profes.innerHTML='<option value="">Seleccione un profesional de apoyo</option'
         
          for(let i=0; i<data.length; ++i){
            profes.innerHTML += '<option class="form-control " data-style="text-dark" value="'+data[i].username+'">'+data[i].name+ data[i].apellidos+'</option>'
            console.log(data[i]);
          }
      })
      .catch(err =>   
          Swal.fire({
                icon: 'error',
                title: 'Validar profesional...',
                text: 'No se encuentran registros del profesional, comunicate con el autorizador!',
              }))  
      }else{

        document.getElementById("profesional").innerHTML= "";
        document.getElementById("prosionaldiv").style.display = "none";
        }
    }, 1000); 
  } 

  function  centroCprof(){
      // setTimeout(() => {
        let nuevojefe = document.getElementById("profesional");
        let jefevalue = nuevojefe.value;

          let url = $(this).attr('action')
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
            },
              url: "profesiona",
              type: 'POST',
              data:{'username': jefevalue} ,
            }).done(function(data) {
              console.log("ajaxewqrfer",data); 
              document.getElementById("centrocosto").value = data[0].programa;
              document.getElementById("email_jefe").value = data[0].email;
              document.getElementById("jefe").value = data[0].username;
              document.getElementById("jefenombre").value = data[0].name;
            })        
       }
});