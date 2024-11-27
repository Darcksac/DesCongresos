<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponentes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

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

    .ponente-card {
        border: 1px solid #ccc;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .ponente-image img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .ponente-details {
        padding: 16px;
        flex-grow: 1;
    }

    .ponente-details h3 {
        margin: 0;
        font-size: 1.2em;
        font-weight: bold;
        color: #333;
    }

    .ponente-details p {
        margin: 4px 0;
        color: #666;
        font-size: 0.9em;
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

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Ponentes</a>
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

    <div class="search-bar container my-4">
        <form class="form-inline justify-content-center" method="GET" action="{{ url('/ponentes2') }}">
            <input type="text" class="form-control mr-2" name="buscar" placeholder="Buscar ponentes..." value="{{ request('buscar') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <div class="container">
        <h3 class="text-center my-4">Ponentes</h3>
        <div class="row">
            @foreach($ponentes as $ponente)
                <div class="col-md-4 mb-4">
                    <div class="ponente-card">
                        @if($ponente->imagen)
                            <div class="ponente-image">
                                <img src="{{ asset('storage/images/' . $ponente->imagen) }}" alt="{{ $ponente->nombre_ponente }}" class="img-fluid">
                            </div>
                        @endif

                        <div class="ponente-details">
                            <h3>{{ $ponente->nombre_ponente }}</h3>
                            <p><strong>Origen:</strong> {{ $ponente->origen_ponente }}</p>
                            <p><strong>Curriculum:</strong> {{ Str::limit($ponente->curriculum, 100) }}</p>
                            <a href="{{ route('ponentes2.show', $ponente->id) }}" class="btn btn-info">
                                Detalles del ponente</a>

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

</body>
</html>
