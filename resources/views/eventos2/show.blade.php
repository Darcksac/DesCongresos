<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Evento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            padding: 20px;
        }

        h1 {
            color: #343a40;
            text-align: center;
        }

        .event-details {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin:  auto;
            box-shadow: 0px 0px 60px rgba(0, 0, 0, 1);
        }

        .event-details img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 0px;
        }

         
         .button-container {
            text-align: center;
            margin-bottom: 20px;
        }

        
        .back-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 15px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 12px;
            font-weight: bold;
            transition: background-color .1s, transform .1s;
            
        }

        .back-button:hover {
            background-color: #ff0000;
            transform: translateY(15px);
        }

        .back-button .fas {
            margin-left: 0px;
        }
    </style>
</head>
<body>

    <h1>Detalles del Evento</h1>

     
     
    <div class="event-details">
        <h2>{{ $evento->nombre_evento }}</h2>
        <p><strong>Descripción:</strong> {{ $evento->descripcion_evento }}</p>
        <td><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d/m/Y') }}</td>
        <p><strong>Hora:</strong> {{ $evento->hora_evento }}</p>
        <p><strong>Duración:</strong> {{ $evento->duracion_evento }} minutos</p>
        <p><strong>Lugar:</strong> {{ $evento->lugar_evento }}</p>
        @if($evento->imagen)
            <p><strong></strong></p>
            <img src="{{ asset('storage/event_images/' . $evento->imagen) }}" alt="Imagen del Evento">
        @endif

        <h4>Ponentes:</h4>
    <ul>
        @if ($evento->ponentes->isEmpty())
            <li>No hay ponentes asignados a este evento.</li>
        @else
            @foreach ($evento->ponentes as $ponente)
                <li>
                    <a href="{{ route('ponentes2.show', $ponente->id) }}">
                        {{ $ponente->nombre_ponente }}
                    </a>
                </li>
            @endforeach
        @endif
    </ul>

    </div>
<div class="button-container">
        <a href="{{ route('eventos2.index') }}" class="back-button" role="button">
            Volver a la lista de eventos
        </a>
    </div>
    <div class="button-container">
        <a href="{{ route('calendario') }}" class="back-button" role="button">
            Volver a el calendario
            
        </a>
    </div>


</body>
</html>
