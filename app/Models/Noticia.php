<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = ['nombre_noticia', 'descripcion_noticia', 'fecha_noticia','archivo_pdf','imagen'];
}
