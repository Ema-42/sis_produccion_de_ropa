<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    public function categoria_articulos(){
        return $this->belongsTo(Categoria_articulo::class,'id_categoria_articulo');
    }
    use HasFactory;
    //declarar debido a que laravel por convencion quiere que las llaves primarias se llamen id 
    protected $primaryKey = "id_articulo";
    protected $fillable = ['id_categoria_articulo','nombre','descripcion','imagen'];
}
