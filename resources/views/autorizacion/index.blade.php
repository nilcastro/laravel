@extends('layouts.main', ['activePage' => 'autorizacion', 'titlePage' => __('Autorizacion de solicitudes')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Lista de solicitudes</h4>
                        <p class="card-category"> todas las solicitudes </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="bodys">
                                <thead class=" text-primary">
                                    <tr>
                                       
                                        <th>Autoriza</th>
                                        <th>Solicitante </th>
                                        <th>Horas </th>
                                        <th>Lugar </th>
                                        <th>Proveedor</th>
                                        <th>Fecha evento</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
                                    <tr ></tr>
                                    @foreach($solicitud as $solicitu)
                                    <tr >
                                  
                                      
                                        <td>{{ $solicitu->nombreauto}}</td>
                                        <td>{{ $solicitu->nombresolici}}</td>
                                        <td>{{ $solicitu->duracion}}</td>
                                        <td>{{ $solicitu->lugaruno}}</td>
                                        <td>{{ $solicitu->Nombreprove}}</td>
                                        <td class="text-primary">{{ $solicitu->fechain}}</td>
                                       
                                    @if( $solicitu->estado == "Pendiente" && Auth::user()->username == $solicitu->autoriza )
                                        <td  class="text-danger"><a href="#" class="btn btn-danger" disabled>{{ $solicitu->estado}}</td>
                                    @elseif( $solicitu->estado == "Rechazar" && Auth::user()->username == $solicitu->autoriza )
                                        <td  class="text-danger"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-danger" >{{ $solicitu->estado}}</td>
                                    @elseif( $solicitu->estado == "Pendiente" && Auth::user()->username == $solicitu->jefe)
                                       <td  class="text-danger"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-danger">{{ $solicitu->estado}}</td>
                                    @elseif($solicitu->estado == "Aceptada")
                                       <td  class="text-"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-warning">{{ $solicitu->estado}}</td>
                                    @else <td  class="text-"><a href="{{ route('autorizacion.edit',$solicitu->id) }}" class="btn btn-success">{{ $solicitu->estado}}</td>
                                    @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
      </script>
   
    <script>
// $(document).ready(function(){

//     $("#btnBuscar").on('click', function() {
//         const strCadena = $("#buscar").val();
//         console.log(strCadena);
//         $.ajax({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             url: "search",
//             type: 'POST',
//             data: {'name': strCadena},
//         }).done(function(res) {
//             //Here catch string and update table information
//             let solicitud = res[0];
            
           
          
//             if(res){
//                 for(let i=0; i<res.length; ++i){
//                   let html_select = `<td>`+res[i].dia`</td><td>`res[i].nombreauto`</td>`;
//                   $("#tabla").append(
//                     conole.log("holaaaa")
//                     document.getElementById("tabla").innerHTML= `<td>`+res[i].dia`</td><td>`res[i].nombreauto`</td>`;
//         )}
             
//               }

//         })
//     });
// });
//     </script>
    @endsection
   