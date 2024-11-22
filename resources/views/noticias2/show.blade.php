<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Noticia</title>
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

        .noticia-details {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0px 0px 60px rgba(0, 0, 0, 1);
        }

        .noticia-details img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }

        .button-container {
    text-align: center;
    margin-bottom: 20px;
}

.cta {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 10px 15px;
    background-color: #007bff;
    color: #ffffff;
    text-decoration: none;
    border-radius: 12px;
    font-weight: bold;
    transition: background-color .1s, transform 0.1s;
}

.cta:hover {
    background-color: #ff0000;
    transform: translateY(15px);
}

    </style>
</head>
<body>

    <h1>Detalles de la Noticia</h1>

    


    <div class="noticia-details">
    <h2>{{ $noticia->nombre_noticia }}</h2>
    <p><strong>Descripción:</strong> {{ $noticia->descripcion_noticia }}</p>
    <td><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($noticia->fecha_noticia)->format('d/m/Y') }}</td>
    @if($noticia->archivo_pdf)
        <p><strong>Documento PDF:</strong></p>
        <a href="{{ asset('storage/' . $noticia->archivo_pdf) }}" target="_blank" class="cta">
            Ver PDF
        </a>
    @endif
    @if($noticia->imagen)
        <p><strong></strong></p>
        <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="Imagen de la noticia">
    @endif

    
</div>
<div class="button-container">
    <a href="{{ route('noticias2.index') }}" class="cta" role="button">
        <span>Volver a la lista de noticias</span>
        
    </a>
</div>

</body>
</html>
