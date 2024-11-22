<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponente extends Model
{
    protected $fillable = ['nombre_ponente', 'origen_ponente', 'curriculum', 'imagen'];

    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'evento_ponente');
    }
}
