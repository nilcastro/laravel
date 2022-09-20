<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
</script>

  const fechain = document.getElementById('fechain');
 
     window.addEventListener('load',function () {
  
 if(fechain){
  fechain.addEventListener('click', function () {
  alert("hola");
    console.log(fechain);
});
 }

   
    });
   
 





   
   // alert("hola");





  
    //alert("hola");
    $("#Nombreprove").on('change', function() {
      var s = $("#Nombreprove").val();
      //alert("hola");
      console.log(s);
      var url = $(this).attr('action')
      $.ajax({
        url: "{{ route('ajax.register')}}",
        type: 'POST',
        data: $("#form1").serialize(),
        success: function(res){
          document.getElementById("Correoelectroni").value= res[0].correoProvee;
          document.getElementById("Teléfono").value= res[0].telProvee;
          document.getElementById("nombrecontactouno").value= res[0].nombreContac;
          document.getElementById("telefonouno").value= res[0].telProvee;
        }
      })
    });
 


