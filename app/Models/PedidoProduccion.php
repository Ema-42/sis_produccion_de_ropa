<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduccion extends Model
{
    use HasFactory;
    protected $table ='pedido_producciones';
    protected $fillable = ['id_detalle_pedido','id_encargado_produccion'];
}
