<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pedido extends Model
{
    //el id debe ser el que esta en pedido
    public function users(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function usuarios(){
        return $this->belongsTo(Usuario::class,'id_usuario');
    }
    public function empresas(){
        return $this->belongsTo(Empresa::class,'id_empresa');
    }
    public function clientes(){
        return $this->belongsTo(Cliente::class,'id_cliente');
    }




    public function ingresos(){
        return $this->hasMany(Ingreso::class,'id_ingreso');
    }
    public function dias(){
        $fecha1 = date_create($this->fecha_entrega);
        $fecha2 = date_create(date('Y-m-d'));
        $dias = date_diff($fecha2, $fecha1)->format('%R%a');
        return $dias;
    }

    public function diasEntrega(){
        $fecha1 = date_create($this->fecha_entrega);
        $fecha2 = date_create($this->fecha_entregado);
        $dias = date_diff($fecha2, $fecha1)->format('%R%a');
        return $dias;
    }

    use HasFactory;
    protected $primaryKey = "id_pedido";
    protected $fillable = ['id_cotizacion','id_usuario','id_empresa','id_cliente','fecha_registro','fecha_entrega','fecha_entregado','nit','total','estado','descuento','comentarios','direccion_entrega','codigo_pedido'];
}
