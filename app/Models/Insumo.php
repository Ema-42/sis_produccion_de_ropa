<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;
    
    public function categoria_insumos(){
        return $this->belongsTo(Categoria_insumo::class,'id_categoria_insumo');
    }

    protected $primaryKey = "id_insumo";
    protected $fillable = ['nombre','descripcion','stock','imagen','id_categoria_insumo'];
}
