<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_pedido extends Model
{
    public function pedidos(){
        return $this->belongsTo(Pedido::class,'id_pedido');
    }
    public function encargadoProducciones(){
        /* al final la tabla pivote */
        return $this->belongsToMany(Encargado_Produccion::class,'pedido_producciones');
    }

    public function articulos(){
        return $this->belongsTo(Articulo::class,'id_articulo');
    }
    public function tallas(){
        return $this->belongsTo(Talla::class,'id_talla');
    }
    public function materiales(){
        return $this->belongsTo(Material::class,'id_material');
    }
    use HasFactory;
    protected $primaryKey = "id_detalle_pedido";
    protected $fillable = ['id_pedido','id_articulo','id_material','id_talla','cantidad','precio_unitario','descuento','sub_total','color','detalles'];
}
