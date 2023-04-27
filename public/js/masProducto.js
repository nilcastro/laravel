$(document).ready(function() {

  let otro = document.getElementById("mas");
  let masfact = document.getElementById("masFactuas");

  otro.addEventListener("click", mas);

  function mas(){
    if(otro.value == 'SI'){
        masfact.style.display = 'block';
    } else if(otro.value == 'NO') {
        console.log(bueno);
        masfact.style.display = 'none';
      }
    }
});
