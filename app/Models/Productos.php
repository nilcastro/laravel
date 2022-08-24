<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
// un proiducto pertenece a un proveedor 
    public function proveedores(){
        return  $this->belongsTo(proveedores::class,'id_provee');
    }
  
    protected $fillable = [
        'nombreProduc',
        'descrProduc',
        'precio',
        'id_provee',
        'nombreProvee'
       
    ];
}
