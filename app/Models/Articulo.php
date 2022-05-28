<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    //declarar debido a que laravel por convencion quiere que las llaves primarias se llamen id 
    protected $primaryKey = "id_articulo";
}
