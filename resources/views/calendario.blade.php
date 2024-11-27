<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Eventos</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css">

    <style>
        
        #calendar {
            width: 100%;
            margin: 0 auto;
            margin-top: 50px;
            background-color: #ffffff;
            color: black;
            border-radius: 10px;
        }

        
        h3.text-center {
            color: black;
            font-family: arial;
            font-weight: bold;
        }

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
            width: 500%;
            height: 00%;
            background-color: rgba(0, 0, 0, 0);
            z-index: 0;
        }

        .promo-banner h1 {
            position: relative;
            z-index: 10;
            font-size: 2em;
        }

        .promo-banner p {
            position: relative;
            z-index: 10;
            font-size: 1.2em;
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
        <a class="navbar-brand" href="#">Calendario</a>
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
                    <a class="nav-link" href="/ponentes2">Ponentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/noticias2">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacto">Contacto</a>
                </li>
                @if(Auth::check())
    <a href="{{ route('eventos.index') }}" class="btn btn-primary">Ir a panel</a>
@else
    <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
@endif
            </ul>
        </div>
    </nav>
  
    <div class="promo-banner">
        
    </div>

   
    <div class="container">
        <h3 class="text-center my-4">Calendario de Eventos</h3>
        <div id="calendar">
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: [
                    @foreach($eventos as $evento)
                        {
                            title: '{{ $evento->nombre_evento }}',
                            start: '{{ $evento->fecha_evento }}',
                            description: '{{ $evento->descripcion_evento }}',
                            url: '{{ url('eventos2/'.$evento->id) }}', 
                        },
                    @endforeach
                ],
                eventClick: function(event) {
                    if (event.url) {
                        window.location.href = event.url; 
                        return false;
                    }
                }
            });
        });
    </script>

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

</body>
</html>
