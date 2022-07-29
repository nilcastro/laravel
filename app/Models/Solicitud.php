<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;
    protected $fillable = [
    'dia', 
    'description',
    'duracion',
    'fechain',
    'fechafi',
    'asistente',
    'autoriza',
    'jefeautori',
    'centrocosto',
    'correoautori',
    'nombresolici',
    'recoge',
    'Nombreprove',
    'Correoelectroni',
    'Teléfono',
    'nombrecontactouno',
    'telefonouno',
    'nombrecontactodos',
    'telefonodos',
    'fechasoliciuno',
    'horauno',
    'lugaruno',
    'producto',
    'nombreauto',
    'cantidad',
    'valorunid',
    'valortota',
    'persrecibe',
    'telefrecibe',
    'fechasolicidos',
    'horados',
    'lugardos',
    'productodos',
    'cantidaddos',
    'valoruniddos',
    'valortotados',
    'persrecibedos',
    'estado',
    ];

}