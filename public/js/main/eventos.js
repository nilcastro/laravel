$(document).ready(function() {
   
const fecha1= document.getElementById("fechain");
const fecha2= document.getElementById("fechafi");
const fechaentr = document.getElementById("fechasoliciuno");


fecha2.addEventListener("change",compararDate,false);
fechaentr.addEventListener("change",fenchaEntrega,false);


function compararDate(){

    let date1=fecha1.valueAsDate
    let date2=fecha2.valueAsDate

        if(date1>date2) {
            alert("La fecha final no puede ser menor que la fecha inicial de la actividad")
        let dato = document.getElementById("fechafi")
        dato.value = ""
        }
    //    console.log(date1<date2?"valid":"invalida")
    }
    
    function fenchaEntrega(){
        let date3 = fechaentr.valueAsDate
        let date4 = fecha2.valueAsDate
        let date5 = fecha1.valueAsDate

        if(date3 > date4 || date3 < date5){
            alert("La fecha de entrega tiene que estar dentro del rango de fechas en que se realizara la actividad")
            let dato = document.getElementById("fechasoliciuno")
            dato.value = ""
        }
    }
})

