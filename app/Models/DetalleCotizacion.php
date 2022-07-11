<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCotizacion extends Model
{
    public function cotizaciones(){
        return $this->belongsTo(Cotizacion::class,'id_cotizacion');
    }
    public function articulos(){
        return $this->belongsTo(Articulo::class,'id_articulo');
    }
    public function materiales(){
        return $this->belongsTo(Material::class,'id_material');
    }

    use HasFactory;
    protected $table ='detalle_cotizaciones';
    public $timestamps = false;
    protected $primaryKey = "id_detalle_cotizacion";
    protected $fillable = ['id_cotizacion','id_articulo','id_material','cantidad','precio_unitario','descuento','sub_total','detalles'];
}
