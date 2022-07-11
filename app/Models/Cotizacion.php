<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
        //el id debe ser el que esta en pedido
        public function users(){
            return $this->belongsTo(User::class,'id_user');
        }
        public function empresas(){
            return $this->belongsTo(Empresa::class,'id_empresa');
        }
        public function clientes(){
            return $this->belongsTo(Cliente::class,'id_cliente');
        }


    use HasFactory;
    protected $table ='cotizaciones';
    protected $primaryKey = "id_cotizacion";
    protected $fillable = ['id_user','id_empresa','id_cliente','total','estado','comentarios','fecha_entrega'];
}
