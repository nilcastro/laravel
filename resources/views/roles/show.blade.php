@extends('layouts.main', ['activePage' => 'roles', 'titlePage' => 'Detalle del rol'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('roles.store') }}" method="post" class="form-horizontal">
                @csrf  
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Roles </h4>
                                <p class="card-category">Vista detallada del permiso {{ $role->name }}</p>
                            </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                          <div class="card card-user">
                                            <div class=" card-body">
                                               <p class="card-text">
                                                   <div class="author">
                                                     
                                                    <a href="">
                                                        <h5 class="tittle mt-3">{{ $role->name}}</h5>
                                                    </a>
                                                    <p class="descrption">
                                                        {{ $role->guard_name }} <br>
                                                        {{ $role->created_at }} 
                                                    </p>
                                                   </div>
                                               </p>
                                               <div class="crad-footer">
                                                   <div class="button-container">
                                                        <button class="btn btn-sm btn-primary ">Editar </button>
                                                   </div>

                                               </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                 </div>
                              
                           
                            </div>
                        </div>
</form>
                    </div>
                </div>
            </div> 
    @endsection