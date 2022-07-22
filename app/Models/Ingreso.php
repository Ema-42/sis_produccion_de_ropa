<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
        //el id debe ser el que esta en ingreso
        public function users(){
            return $this->belongsTo(User::class,'id_user');
        }
        public function usuarios(){
            return $this->belongsTo(Usuario::class,'id_usuario');
        }
        public function empresas(){
            return $this->belongsTo(Empresa::class,'id_empresa');
        }
        public function proveedores(){
            return $this->belongsTo(Proveedor::class,'id_proveedor');
        }
        public function pedidos(){
            return $this->belongsTo(Pedido::class,'id_pedido');
        }
        public function clientes(){
            return $this->belongsTo(Cliente::class,'id_cliente');
        }


        public function detalle_ingresos(){
            return $this->hasMany(DetalleIngreso::class,'id_detalle_ingresos');
        }

    use HasFactory;
    protected $table ='ingresos';
    protected $primaryKey = "id_ingreso";
    protected $fillable = ['id_user','id_usuario','id_empresa','id_proveedor','id_pedido','total','tipo_comprobante','numero_comprobante','codigo_ingreso'];
}
