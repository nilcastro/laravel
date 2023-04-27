$(document).ready(function() {
    let cantidad1 =  document.getElementById("cantidad");
    let cantidad2 =  document.getElementById("cantidaddos");
    let cantidad3 =  document.getElementById("cantidadtres");
    let cantidad4 =  document.getElementById("cantidadcuatro");
    let cantidad5 =  document.getElementById("cantidadcinco");
    let totalfinal =  document.getElementById("valortotalfinal");

    [cantidad1, cantidad2, cantidad3, cantidad4, cantidad5].forEach(cantidads => {
        cantidads.addEventListener("change", (e)=>{calcularTotal(e)}, false);
    });

      function calcularTotal(event) {
      
        
        let formato = event.target.getAttribute("tag")
    
        let canti = document.getElementById("cantidad"+formato).value;
        let precio = document.getElementById("valorunid"+formato).value;
        let totale = 0;
        totale = canti * precio;
      
        document.getElementById("valortota"+formato).value = totale;
      
        totales()
      }
    

      function totales(){
        let total = 0;
        let target = [ "","dos","tres","cuatro","cinco"];
            
        for (let i = 0; i<target.length; i++) {
          var valorTotalActual = parseInt(document.getElementById("valortota"+target[i]).value);
       
          total +=  valorTotalActual; 
        
        
      }
       document.getElementById("valortotalfinal").value=  total;
      
       
        console.log( document.getElementById("valortotalfinal").value =  total);
        
       }

    });