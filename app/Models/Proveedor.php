<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table ='proveedores';
    protected $primaryKey = "id_proveedor";
    protected $fillable = ['primer_nombre','segundo_nombre','apellido_paterno','apellido_materno','telefono','celular','direccion','nro_dip','correo','nombre_empresa','estado','url_pagina','nit'];
}
