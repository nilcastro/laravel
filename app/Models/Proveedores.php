<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    public function productos(){
        return $this->hasMany(Productos::class,'id');
    }
  
    public function getAllNames()
    {
       return $this->select('nombreProvee')->get();
    }
    protected $fillable = [
        'nombreProvee',
        'correoProvee',
        'direccion',
        'nombreContac',
        'telProvee',
        'nombrecontactodos',
        'telefonodos',
        'activo',
        'especial',
    ];

}
