<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function users(){
        return $this->belongsTo(User::class,'id');
    }
    public function empresas(){
        return $this->belongsTo(Empresa::class,'id_empresa');
    }
    public function clientes(){
        return $this->belongsTo(Cliente::class,'id_cliente');
    }
    use HasFactory;
    protected $primaryKey = "id_pedido";
    protected $fillable = ['id_usuario','id_empresa','id_cliente','fecha_registro','fecha_entrega','fecha_entregado','nit','total','estado','descuento','comentarios','direccion_entrega','codigo_pedido'];
}
