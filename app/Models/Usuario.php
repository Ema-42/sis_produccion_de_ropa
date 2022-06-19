<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public function pedidos(){
        return $this->hasMany(Pedido::class,'id_pedido');
    }
    protected $primaryKey = "id_usuario";
/*     protected $fillable = ['id_usuario','id_empresa','id_cliente','fecha_registro','fecha_entrega','fecha_entregado','nit','total','estado','descuento','comentarios','direccion_entrega','codigo_pedido'];
 */
    protected $fillable = ['primer_nombre','apellido_paterno'];
}
