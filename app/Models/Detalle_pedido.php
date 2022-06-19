<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_pedido extends Model
{
    public function pedidos(){
        return $this->belongsTo(Pedido::class,'id_pedido');
    }
    use HasFactory;
    protected $primaryKey = "id_detalle_pedido";
    protected $fillable = ['id_pedido','id_articulo','id_material','id_talla','cantidad','precio_unitario','descuento','sub_total','color','detalles'];
}
