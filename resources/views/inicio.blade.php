<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .promo-banner {
            padding: 20px 20px;
            color: white;
            text-align: center;
            background-image: url('storage/Banner/banner.jpg'); 
            background-size: cover;
            background-position: top left;
            position: relative;
            width: 100%;
            height: 375px; 
        }
        
        .promo-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0); 
            z-index: 0;
        }

        .event-card, .news-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 20px;
            display: flex;
            flex-direction: row;
            width: 100%;
            height: 200px; 
        }

        .event-card img, .news-card img {
            width: 250px; 
            height: 250px; 
            object-fit: cover; 
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .event-card-content, .news-card-content {
            padding: 15px;
            width: 60%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: justify; 
        }

        .event-date, .news-date {
            text-align: center;
            margin-right: 25px;
            margin-bottom: 10px;
            padding-left: 25px;
            margin-top: 80px; 
        }

        .event-date .month, .news-date .month {
            font-size: 0.9em;
            font-weight: bold;
            color: #666;
        }

        .event-date .day, .news-date .day {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
        }

        .event-details {
            flex: 1;
            text-align: center; 
        }
        .news-details {
    flex: 1;
    text-align: center;
    margin-top: 30px; 
}


        .event-details h3, .news-details h3 {
            margin: 25;
            font-size: 1.1em;
            font-weight: bold;
            color: #333;
        }

        .event-details p, .news-details p {
            margin: 20px 0;
            color: #666;
            font-size: 0.9em;
        }

        .availability-badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 0.8em;
            font-weight: bold;
            color: #fff;
            background-color: #ffcc00;
            border-radius: 4px;
        }

        .arrow-icon {
            font-size: 1.5em;
            color: #007bff;
            margin-left: 16px;
        }

        .view-more-btn {
            margin-left: auto; 
            text-align: right;
            margin-top: auto; 
            margin-bottom: 5px; 
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #f1f1f1;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer .social-icons i {
            font-size: 1.5em;
            margin: 0 10px;
            color: #fff;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/eventos2">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/calendario">Calendario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/noticias2">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ponentes2">Ponente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Admin</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="promo-banner">
        
    </div>


    <div class="search-bar container my-4">
        <form class="form-inline justify-content-center" method="GET" action="{{ url('/inicio') }}">
            <input type="text" class="form-control mr-2" name="buscar" placeholder="Buscar eventos y noticias..." value="{{ request('buscar') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <div class="events-section container">
        <h3 class="text-center my-4">Eventos Disponibles</h3>
        <div class="row">
            @foreach($eventos as $evento)
                <div class="col-md-12 mb-4">
                    <div class="event-card">
                        @if($evento->imagen)
                            <div class="event-image">
                                <img src="{{ asset('storage/event_images/' . $evento->imagen) }}" alt="{{ $evento->nombre_evento }}" class="img-fluid">
                            </div>
                        @endif
                        <div class="event-date">
                            <div class="month">{{ \Carbon\Carbon::parse($evento->fecha_evento)->format('M') }}</div>
                            <div class="day">{{ \Carbon\Carbon::parse($evento->fecha_evento)->format('d') }}</div>
                        </div>
                        <div class="event-details flex-grow-1">
                            <p><strong>{{ \Carbon\Carbon::parse($evento->hora_evento)->format('H:i') }}</strong></p>
                            <h3>{{ $evento->nombre_evento }}</h3>
                            <p>{{ Str::limit($evento->descripcion_evento, 100) }}</p>
                            <p><strong>Lugar:</strong> {{ $evento->lugar_evento }}</p>
                        </div>
                        <div class="view-more-btn">
                            <a href="http://127.0.0.1:8000/eventos2" class="btn btn-info">Ver todos los eventos</a>
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="news-section container">
        <h3 class="text-center my-4">Últimas Noticias</h3>
        <div class="row">
            @foreach($noticias as $noticia)
                <div class="col-md-12 mb-4"> 
                    <div class="news-card">
                        <div class="news-image">
                            <img src="{{ asset('storage/' . $noticia->imagen) }}" alt="{{ $noticia->nombre_noticia }}"/>
                        </div>
                        <div class="event-date">
                            <div class="month">{{ \Carbon\Carbon::parse($noticia->fecha_noticia)->format('M') }}</div>
                            <div class="day">{{ \Carbon\Carbon::parse($noticia->fecha_noticia)->format('d') }}</div>
                        </div>
                        <div class="news-details flex-grow-1">
                            <h3>{{ $noticia->nombre_noticia }}</h3>
                            <p>{{ Str::limit($noticia->descripcion_noticia, 100) }}</p>
                        </div>
                        <div class="view-more-btn">
                            <a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-info">Ver todas las noticias</a>
                        </div>
                       
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer>
    <div class="footer-top">
        <div class="footer-logo">
            <img src="https://papirolas.udg.mx/wp-content/uploads/2022/05/logo_UDG-768x240.png" alt="Congreso" style="max-width: 150px;">
        </div>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark footer-nav">
    <div class="container">
        <div class="collapse navbar-collapse justify-content-center" id="footerNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/inicio">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacto">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/eventos2">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ponentes2">Ponentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/noticias2">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/calendario">Calendario</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

        <p>&copy; 2024 Todos los derechos reservados. | <a href="#">Política de privacidad</a> | <a href="#">Términos de uso</a></p>
    </div>

    <div class="footer-bottom">
        <p>Estamos comprometidos con la calidad y la satisfacción del usuario. Si tienes alguna pregunta, no dudes en <a href="/contact">contactarnos</a>.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>