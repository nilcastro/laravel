$(document).ready(function() {

    const btnbusc =  document.getElementById("btnserch");
    const text = document.getElementById("texto");
    let resul = document.getElementById("resultados");

    
    btnbusc.addEventListener("click",buscador,false);
    text.addEventListener("focus",limpiar,false);
    

    function buscador(){
     
        if((text.value.length)>1)
             fetch(`buscador?texto=${text.value}`,{
                method: 'get'
            })
            .then(response => response.json() )
            .then(data => { 
              
                if(!data.ok){
                    var tabla = document.createElement('table')
                    tabla.style.padding = '1px';
                    // por cada dato se crea una fila
                    for (const fila of data){
                        let tr = document.createElement('tr');
                    
                        // otro bucle para recorrer los datos de cada objeto
                        for (const atributo of Object.values(fila)) {
                    
                            var celda = document.createElement('td');
                            celda.textContent = atributo;
                            celda.style.borderTop = '1px solid';
                            
                            tr.appendChild(celda);
                           
                        }
                        
                        tr.appendChild(celda);
                    
                        // tabla.appendChild(tr);
                        resul.appendChild(tr);
                        
                    }
                    text.value = " "
                    window.load();
                }
        
            })
      
    }

    function limpiar(){
  
    window.onload();
    }
    

});





