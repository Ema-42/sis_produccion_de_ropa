<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table ='materiales';
    protected $primaryKey = "id_material";
    protected $fillable = ['nombre','descripcion'];
}
