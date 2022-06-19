<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function pedidos(){
        return $this->hasMany(Pedido::class,'id_pedido');
    }
    use HasFactory;
    protected $primaryKey = "id_cliente";
    protected $fillable = ['primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','fecha_nacimiento','telefono','celular','direccion','nro_dip','sexo','correo','fecha_registro'];
}
