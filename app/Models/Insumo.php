<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;
    protected $primaryKey = "id_insumo";
    protected $fillable = ['nombre','descripcion','stock','imagen','id_categoria_insumo'];
}
