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
                    var tabla = document.createElement('table');

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
                    
                        tabla.appendChild(tr);
                        resul.appendChild(tabla);
 
                    }
                    text.value = " "

                    // alert("no existenn ");
                }
        
            })
      
    }

    function limpiar(){
       resul.innerHTML = " ";
    }


});








    // document.getElementById("texto").addEventListener("keyup", function(){
     
    //     if((document.getElementById("texto").value.length)>=1)
    //          fetch(`buscador?texto=${document.getElementById("texto").value}`,{
    //             method: 'get'
    //         })
    //         .then(response => response.json() )
    //         .then(data => { 
    //             var tabla = document.createElement('table');

    //             // por cada dato se crea una fila
    //             for (const fila of data){
    //                 let tr = document.createElement('tr');
                
    //                 // otro bucle para recorrer los datos de cada objeto
    //                 for (const atributo of Object.values(fila)) {
                
    //                     var celda = document.createElement('td');
    //                     celda.textContent = atributo;
    //                     celda.style.borderTop = '1px solid';
    //                     tr.appendChild(celda);
                       
    //                 }
                    
    //                 tr.appendChild(celda);
                
    //                 tabla.appendChild(tr);
                  
    //             }
    //               document.getElementById("resultados").appendChild(tabla);  
                 
    //             })
                
    //     else
    //     document.getElementById("resultados").innerHTML = " "
      
    // }) 
