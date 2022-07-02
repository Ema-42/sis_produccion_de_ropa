<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado_Produccion extends Model
{
    public function detallePedidos(){
        /* al final la tabla pivote */
        return $this->belongsToMany(Detalle_pedido::class,'pedido_producciones');
    }

    use HasFactory;
    protected $table ='encargado_producciones';
    protected $primaryKey = "id_encargado_produccion";
    protected $fillable = ['primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','telefono','celular','direccion','nro_dip','correo','fecha_nacimiento'];

}
