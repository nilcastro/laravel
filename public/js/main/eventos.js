$(document).ready(function() {

   

const fecha1= document.getElementById("fechain");
const fecha2= document.getElementById("fechafi");
const fechaentr = document.getElementById("fechasoliciuno");
const tiempo = document.getElementById("duracion");

let input = document.getElementById("observAsistente");
let estad = document.getElementById("estado");

fecha2.addEventListener("change",compararDate,false)
fechaentr.addEventListener("change",fenchaEntrega,false)
tiempo.addEventListener("blur",duraciones,false)


 

function compararDate(){

    let date1=fecha1.valueAsDate
    let date2=fecha2.valueAsDate

        if(date1>date2) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La fecha final no puede ser antes que la fecha inicial de la actividad!',
              })
          
        let dato = document.getElementById("fechafi")
        dato.value = ""
        }
        // console.log(date1<date2?"valid":"invalida")
    }
    
    function fenchaEntrega(){
        let date3 = fechaentr.valueAsDate
        let date4 = fecha2.valueAsDate
        let date5 = fecha1.valueAsDate

        if(date3 > date4 || date3 < date5){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La fecha de entrega tiene que estar dentro del rango de fechas en que se realizara la actividad!',
              })
            
            let dato = document.getElementById("fechasoliciuno")
            dato.value = ""
        }
    }

    function duraciones(){
     
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

    
   
 });