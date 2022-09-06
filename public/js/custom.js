
    $(document).ready(function(){
        $("#btnBuscar").on('click', function() {
            const strCadena = $("#buscar").val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "search",
                type: 'POST',
                data: {'name': strCadena},
            }).done(function(res) {
                //Here catch string and update table information
                console.log(res);
            })
        });
    });
