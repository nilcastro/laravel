
$(document).ready(function() {


const fecha1= document.getElementById("fechain");
const fecha2= document.getElementById("fechafi");
const fechaentr = document.getElementById("fechasoliciuno");
const tiempo = document.getElementById("duracion");
const telefono = document.getElementById("telefrecibe");
const centrocosto = document.getElementById("centrocosto");
const rechazad =  document.getElementById("estado");

const input = document.getElementById("observAsistente");
const estad = document.getElementById("estado");

if(telefono){
  telefono.addEventListener("change",telefonos,false);
}
if(fecha2){
  fecha2.addEventListener("change",compararDate,false);
}
if(fechaentr){
  fechaentr.addEventListener("change",fenchaEntrega,false);
}
if(tiempo){
  tiempo.addEventListener("blur",duraciones,false);

}


function compararDate(){
  console.log("aca empieza")
    let date1=fecha1.valueAsDate
    let date2=fecha2.valueAsDate
    let dat = date1

       if(date1){

            if(date1>date2) {

                Swal.fire({
                    icon: 'error',
                    title: 'Validar fecha',
                    text: 'La fecha final no puede ser antes que la fecha inicial de la actividad!',
                })
                let dato = document.getElementById("fechafi");
                dato.innerHTML = "";
            } 
        }else{
           
            Swal.fire({
                icon: 'error',
                title: 'Validar fecha inicial',
                text: 'La fecha inicial no puede estar vacia antes que la fecha final de la actividad!',
                })      
                let dato = document.getElementById("fechafi")
                dato.value = ""
                }      
    }
    
    function fenchaEntrega(){
        let date3 = fechaentr.valueAsDate
        let date4 = fecha2.valueAsDate
        let date5 = fecha1.valueAsDate

        if(date3 > date4 || date3 < date5){
            Swal.fire({
                icon: 'error',
                title: 'Validar fecha',
                text: 'La fecha de entrega tiene que estar dentro del rango de fechas en que se realizara la actividad!',
              })
            
            let dato = document.getElementById("fechasoliciuno")
            dato.value = ""
        }
    }

    function duraciones(){
      console.log("aca empieza")
        let tiemp = tiempo.value
        if(tiemp < 4){
                Swal.fire(
                `Tiempo  ${tiemp} horas`,
                'El tiempo de duración del evento no puede ser menor de 4 horas',
                'question'
                )
           tiempo.value = ""
          }
    }

    function telefonos(){
     
        let telef = telefono.value
        console.log(telef.length);
        if(telef.length  > 12 || telef.length  < 10){
            Swal.fire(
            `Validar número de teléfono `,
            'El el número de teléfono no puede ser mayor de 12 digitos o menor de 10 digitos',
            'question'
            )
            telefono.value = ""
      }
    }
    function rechazado(){
        let telef = rechazad.value
      if(telef == "Rechazada"){
       
        document.getElementById("observacionincomplet").style.display="block";
        document.getElementById("aceptado").style.display="none";
        document.getElementById("rechazado").style.display="block";
      }else {
        document.getElementById("observacionincomplet").style.display="none";
        document.getElementById("aceptado").style.display="block";
        document.getElementById("rechazado").style.display="none";

      }
    }
  });