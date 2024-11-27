<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            height: 378px; 
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

        .contact-card {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .contact-card h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .contact-card p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .contact-card .contact-info {
            margin-top: 30px;
        }

        .contact-card .contact-info li {
            list-style: none;
            margin-bottom: 10px;
        }

        .contact-card .contact-info i {
            margin-right: 10px;
            color: #007bff;
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
        <a class="navbar-brand" href="#">Contacto</a>
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
                    <a class="nav-link" href="/calendario">Calendario</a>
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
        <div class="contact-card">
            <h3>Mis Datos de Contacto</h3>

            <p>¡Hola! Soy Isaac. Si deseas ponerte en contacto conmigo, aquí tienes mis datos:</p>

            <div class="contact-info">
                <ul>
                    <li><i class="fas fa-phone"></i> Teléfono: +1234567890</li>
                    <li><i class="fas fa-envelope"></i> Correo: contacto@tudominio.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Dirección: Calle Ejemplo 123, Ciudad, País</li>
                </ul>
            </div>
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

    <script src="https://kit.fontawesome.com/a076d05399.js"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
