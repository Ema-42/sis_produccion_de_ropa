<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    public function ingresos(){
        return $this->belongsTo(Ingreso::class,'id_ingreso');
    }
    public function insumos(){
        return $this->belongsTo(Insumo::class,'id_insumo');
    }

    protected $table ='detalle_ingresos';
    protected $primaryKey = "id_detalle_ingreso";
    protected $fillable = ['id_ingreso','id_insumo','precio_unitario','cantidad','descuento','subtotal','sub_total','detalles'];
    use HasFactory;
    public $timestamps = false;
}
