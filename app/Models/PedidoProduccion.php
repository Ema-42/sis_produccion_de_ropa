<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduccion extends Model
{
    public function encargados(){
        return $this->belongsTo(Encargado_Produccion::class,'id_encargado_produccion');
    }

    use HasFactory;
    protected $table ='pedido_producciones';
    protected $primaryKey = "id_detalle_pedido";
    protected $fillable = ['id_detalle_pedido','id_encargado_produccion'];
}
