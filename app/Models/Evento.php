<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'nombre_evento',
        'descripcion_evento',
        'fecha_evento',
        'hora_evento',
        'lugar_evento',
        'duracion_evento',
        'imagen',
    ];

    // Relación con Ponente
    public function ponentes()
    {
        return $this->belongsToMany(Ponente::class, 'evento_ponente'); 
    }

    // Eliminar imagen al eliminar evento
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($evento) {
            if ($evento->imagen && Storage::exists('public/event_images/' . $evento->imagen)) {
                Storage::delete('public/event_images/' . $evento->imagen);
            }
        });
    }
}
