$(document).ready(function() {
  
    let novedades = document.getElementById("novedad");

    novedades.addEventListener("change",novedadesfin, false);

    function novedadesfin(){
        alert("si change");
        document.getElementById("observacionincompleta").style.display= "block"; 
    }

})