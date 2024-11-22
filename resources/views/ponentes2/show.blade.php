<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Ponente</title>
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

        .ponente-details {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin:  auto;
            box-shadow: 0px 0px 60px rgba(0, 0, 0, 1);
        }

        .ponente-details img {
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

    <h1>Detalles del Ponente</h1>

    
    <div class="ponente-details">
        <h2>{{ $ponente->nombre_ponente }}</h2>
        <p><strong>Origen:</strong> {{ $ponente->origen_ponente }}</p>
        <p><strong>CV:</strong> {{ $ponente->curriculum }}</p>
        @if($ponente->imagen)
            <p><strong></strong></p>
            <img src="{{ asset('storage/images/' . $ponente->imagen) }}" alt="Imagen del ponente">
        @endif
    </div>
<div class="button-container">
        <a href="{{ route('ponentes2.index') }}" class="back-button" role="button">
            Volver a la lista de ponentes
            
        </a>
    </div>

    <div class="button-container">
        <a href="{{ route('eventos2.index') }}" class="back-button" role="button">
            Volver a la lista de eventos
            
        </a>
    </div>

</body>
</html>
