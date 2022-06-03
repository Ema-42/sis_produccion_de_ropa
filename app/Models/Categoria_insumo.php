<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_insumo extends Model
{
    use HasFactory;
    protected $primaryKey = "id_categoria_insumo";
    protected $fillable = ['nombre','descripcion','stock','imagen'];
}

