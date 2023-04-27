
<div class="content">
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-md-12">
                <div class="card">
                 
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="bodys">
                                <thead class=" text-primary">
                                    <tr> 
                                        <th>Fecha</th>
                                        <th>Descripción</th>
                                        <th>Duración</th>
                                        <th>Fecha inicial</th>
                                        <th>Fecha final</th>
                                        <th>Asistentes</th>
                                        <th>Observación asistentes</th>
                                        <th>ID Autoriza</th>
                                        <th>Nombre autoriza</th>
                                        <th>Correo autorizador</th>
                                        <th>Unidad autorizadora</th>
                                        <th>Jefe autorizador</th>
                                        <th>Centro de costo</th>
                                        <th>Observ. Centro de costo</th>
                                        <th>ID solicitante</th>
                                        <th>Solicitante</th>
                                        <th>Correo solicitante</th>
                                        <th>ID Jefe del solicitante</th>
                                        <th>Nombre Jefe del solicitante</th>
                                        <th>Correo del jefe</th>
                                        <th>Nombre profesional</th>
                                        <th>Persona que Recoge</th>
                                        <th>Nombre proveedor </th>
                                        <th>Correo electronico proveedor</th>
                                        <th>Teléfono</th>
                                        <th>Fecha entrega</th>
                                        <th>Hora entrega</th>
                                        <th>Lugar entrega</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Valor</th>
                                        <th>Total</th>
                                        <th>Fecha entrega dos</th>
                                        <th>Hora entrega dos</th>
                                        <th>Lugar entrega dos</th>
                                        <th>Producto dos</th>
                                        <th>Cantidad dos</th>
                                        <th>Valor dos</th>
                                        <th>Total dos</th>
                                        <th>Fecha entrega tres</th>
                                        <th>Hora entrega tres</th>
                                        <th>Lugar entrega tres</th>
                                        <th>Producto tres</th>
                                        <th>Cantidad tres</th>
                                        <th>Valor tres</th>
                                        <th>Total tres</th>
                                        <th>Fecha entrega cuatrto</th>
                                        <th>Hora entrega cuatrto</th>
                                        <th>Lugar entrega cuatrto</th>
                                        <th>Producto cuatrto</th>
                                        <th>Cantidad cuatrto</th>
                                        <th>Valor cuatrto</th>
                                        <th>Total cuatrto</th>
                                        <th>Fecha entrega cinco</th>
                                        <th>Hora entrega cinco</th>
                                        <th>Lugar entrega cinco</th>
                                        <th>Producto cinco</th>
                                        <th>Cantidad cinco</th>
                                        <th>Valor cinco</th>
                                        <th>Total cinco</th>
                                        <th>Total tactura</th>
                                        <th>Estado</th>
                                        <th>Observación estado</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
                                    <tr ></tr>
                                    @foreach($reportes as $solicitu)
                                    <tr >
                                        <td>{{ $solicitu->dia}}</td>
                                        <td>{{ $solicitu->description}}</td>
                                        <td>{{ $solicitu->duracion}}</td>
                                        <td>{{ $solicitu->fechain}}</td>
                                        <td>{{ $solicitu->fechafi}}</td>
                                        <td>{{ $solicitu->asistente}}</td>
                                        <td>{{ $solicitu->observacion}}</td>
                                        <td>{{ $solicitu->autoriza}}</td>
                                        <td>{{ $solicitu->nombreauto }}</td>
                                        <td>{{ $solicitu->correoautori}}</td>
                                        <td>{{ $solicitu->unidadAutori}}</td>
                                        <td>{{ $solicitu->jefenombre}}</td>
                                        <td>{{ $solicitu->centrocosto}}</td>
                                        <td>{{ $solicitu->observCentrocosto}}</td> 
                                        <td>{{ $solicitu->username}}</td>
                                        <td>{{ $solicitu->nombresolici}}</td>
                                        <td>{{ $solicitu->email}}</td>
                                        <td>{{ $solicitu->jefe}}</td>
                                        <td>{{ $solicitu->jefeautori}}</td>
                                        <td>{{ $solicitu->email_jefe}}</td>
                                        <td>{{ $solicitu->profesional}}</td>
                                        <td>{{ $solicitu->recoge}}</td>
                                        <td>{{ $solicitu->Nombreprove}}</td>
                                        <td>{{ $solicitu->Correoelectroni}}</td>
                                        <td>{{ $solicitu->Teléfono}}</td>
                                        <td>{{ $solicitu->fechasoliciuno}}</td>
                                        <td>{{ $solicitu->horauno}}</td>
                                        <td>{{ $solicitu->lugaruno}}</td>
                                        <td>{{ $solicitu->producto}}</td>
                                        <td>{{ $solicitu->cantidad}}</td>
                                        <td>{{ $solicitu->valortota}}</td>
                                        <td>{{ $solicitu->fechasolicidos}}</td>
                                        <td>{{ $solicitu->horados}}</td>
                                        <td>{{ $solicitu->lugardos}}</td>
                                        <td>{{ $solicitu->productodos}}</td>
                                        <td>{{ $solicitu->cantidaddos}}</td>
                                        <td>{{ $solicitu->valoruniddos}}</td>
                                        <td>{{ $solicitu->valortotados}}</td>
                                        <td>{{ $solicitu->fechasolicitres}}</td>
                                        <td>{{ $solicitu->horatres}}</td>
                                        <td>{{ $solicitu->lugartres}}</td>
                                        <td>{{ $solicitu->productotres}}</td>
                                        <td>{{ $solicitu->cantidatres}}</td>
                                        <td>{{ $solicitu->valorunidtres}}</td>
                                        <td>{{ $solicitu->valortotatres}}</td>
                                        <td>{{ $solicitu->fechasolicicuatro}}</td>
                                        <td>{{ $solicitu->horacuatro}}</td>
                                        <td>{{ $solicitu->lugarcuatro}}</td>
                                        <td>{{ $solicitu->horacuatro}}</td>
                                        <td>{{ $solicitu->productocuatro}}</td>
                                        <td>{{ $solicitu->cantidadcuatro}}</td>
                                        <td>{{ $solicitu->valorunidcuatro}}</td>
                                        <td>{{ $solicitu->valortotacuatro}}</td>
                                        <td>{{ $solicitu->fechasolicicinco}}</td>
                                        <td>{{ $solicitu->horacinco}}</td>
                                        <td>{{ $solicitu->lugarcinco}}</td>
                                        <td>{{ $solicitu->productocinco}}</td>
                                        <td>{{ $solicitu->cantidadcinco}}</td>
                                        <td>{{ $solicitu->valortotacinco}}</td>
                                        <td>{{ $solicitu->valortotalfinal}}</td>
                                        <td>{{ $solicitu->valortotalfinal}}</td>
                                        <td>{{ $solicitu->estado}}</td>
                                        <td>{{ $solicitu->observacionincomplet}}</td>
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
