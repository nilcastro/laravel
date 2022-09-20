
$(document).ready(function() {

let nombre = document.getElementById("nombreauto");

let profesi= document.getElementById("profesional");

nombre.addEventListener("change",profesion,false)



  function profesion(){
    
    setTimeout(() => {
      let date1=nombre.value
      let ident= document.getElementById("id").value
      const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      if(ident == 12){
       
      console.log("aca estoy");
      console.log(ident)
        if((ident.length)>1)
          fetch("profes",{
            method: 'get'
        })
      .then(response => response.json())  
      .then(data => {

          let opt = '<option class="form-control" value=""> Selecciona un profesional</option>'
       
          for(let i=0; i<data.length; ++i){
            
            let html_select ='<option value="">Seleccione un profesional de apoyo</option';
            let forr = '<option class="form-control" value="'+data[i].name+ data[i].apellidos+'">'+data[i].name+ data[i].apellidos+'</option>'
            document.getElementById("profesional").innerHTML= forr 
          } 
      })
      .catch(err =>   
          Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No se encuentran registros del profesional, comunicate con el autorizador!',
              }))  
     }
  
    }, 1000); 
  }


});