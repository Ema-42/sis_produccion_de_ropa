<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_articulo extends Model
{
    use HasFactory;
    public function articulos(){
        return $this->hasMany(Articulo::class,'id_articulo');
    }
    protected $primaryKey = "id_categoria_articulo";
    protected $fillable = ['nombre','descripcion'];
}
