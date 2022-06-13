<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_insumo extends Model
{
    use HasFactory;
    public function insumos(){
        return $this->hasMany(Insumo::class,'id_insumo');
    }

    protected $primaryKey = "id_categoria_insumo";
    protected $fillable = ['nombre','descripcion'];
}

