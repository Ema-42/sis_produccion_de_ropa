<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function pedidos(){
        return $this->hasMany(Pedido::class,'id_pedido');
    }
    public function ingresos(){
        return $this->hasMany(Ingreso::class,'id_ingreso');
    }
    use HasFactory;
    protected $primaryKey = "id_empresa";
    protected $fillable = ['nombre','nit','direccion','correo','telefono','celular'];
}
