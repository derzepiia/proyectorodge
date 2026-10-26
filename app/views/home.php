
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home - Rodge</title>

    <!-- fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="css/stylesheet-hom.css?v=2">
    <link rel="stylesheet" href="css/stylesheet-log.css">

</head>



<body style="margin: 0; min-height: 100vh; background-image: url('Recursos/Canchas-y-fondo/Imagenes-fondo/Backgraund1.svg'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">


    <!-- TOP BAR -->

    <div class="top-bar">

        <button class="mi-cuenta"
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#loginModal">

            <img src="Recursos/Icons/user.png" alt="Usuario">

            <span>Mi Cuenta</span>

        </button>

    </div>



    <!-- NAVBAR -->

    <nav class="navbar navbar-expand-lg navbar-dark main-navbar">

        <div class="container-fluid">

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navMenu"
                    aria-controls="navMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>



            <div class="collapse navbar-collapse" id="navMenu">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-3">

                    <li class="nav-item">
                        <a class="nav-link" href="#canchas">
                            Canchas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#localizacion">
                            Localización
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#noticias">
                            Noticias
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#reserva">
                            Reserva
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#resenas">
                            Reseñas
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>



    <!-- HERO -->

    <section class="hero-section text-center text-white py-5">

        <div class="container-biemvenido">

            <h1 class="display-4">
                Bienvenido a complejo 5 cruces
            </h1>

            <p class="lead">
                Tu plataforma para reservar canchas deportivas de manera fácil y rápida.
            </p>

            <a href="#canchas"
                class="btn btn-success btn-lg mt-3">

                Explorar Canchas

            </a>

        </div>

    </section>



    <!-- CANCHAS -->

    <section id="canchas" class="container my-5">


        <!-- CANCHA 1 -->

        <div class="row align-items-center mb-5">

            <div class="col-md-6">

                <img src="Recursos/Canchas-y-fondo/Imagenes-canchas/canch1.svg"
                     class="img-fluid rounded"
                     alt="Cancha 1">

            </div>



            <div class="col-md-6">

                <h3>
                    Cancha 1º Norte - fútbol 5
                </h3>

                <p>
                    Ubicada en la ciudad de La Paz, es un espacio diseñado para disfrutar del fútbol 5 en un entorno cómodo y preparado para la competencia. Cuenta con superficie de pasto sintético de alta calidad, brindando una experiencia de juego dinámica, segura y adaptada tanto para partidos recreativos como encuentros más competitivos.
                </p>

            </div>

        </div>



        <!-- CANCHA 2 -->

        <div class="row align-items-center mb-5">

            <div class="col-md-6 order-md-2">

                <img src="Recursos/Canchas-y-fondo/Imagenes-canchas/canch2.svg"
                     class="img-fluid rounded"
                     alt="Cancha 2">

            </div>



            <div class="col-md-6 order-md-1">

                <h3>
                    Cancha 2º central - fútbol 5
                </h3>

                <p>
                    Situada en una ubicación estratégica dentro del complejo, ofrece el espacio ideal para vivir grandes partidos de fútbol 5. Su superficie de pasto sintético permite un juego fluido y cómodo, garantizando excelentes condiciones para compartir con amigos, entrenar o competir.
                </p>

            </div>

        </div>



        <!-- CANCHA 3 -->

        <div class="row align-items-center mb-5">

            <div class="col-md-6">

                <img src="Recursos/Canchas-y-fondo/Imagenes-canchas/canch3.svg"
                     class="img-fluid rounded"
                     alt="Cancha 3">

            </div>



            <div class="col-md-6">

                <h3>
                    Cancha 3º Sur - fútbol 5
                </h3>

                <p>
                    Se encuentra en la ciudad de La Paz y está preparado para quienes buscan disfrutar del fútbol en un ambiente moderno y equipado. Con pasto sintético de calidad, proporciona una superficie óptima para desarrollar partidos cómodos, entretenidos y con el mejor rendimiento durante el juego.
                </p>

            </div>

        </div>

    </section>



    <!-- LOCALIZACIÓN -->

    <section id="localizacion" class="container my-5">

        <h1 class="text-center mb-4">
            Localización
        </h1>



        <div class="row g-4 align-items-start">



            <!-- MAPA -->

            <div class="col-lg-8">

                <div class="mapa-box">

                    <iframe
                        src="https://www.google.com/maps?q=-34.764738,-56.215859&z=17&output=embed"
                        width="100%"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>

                </div>

            </div>



            <!-- INFO -->

            <div class="col-lg-4">

                <div class="info-box p-3 rounded shadow-sm">

                    <h3>
                        Encuentra nuestras canchas
                    </h3>

                    <p>
                        Aquí puedes ver la ubicación exacta de todas nuestras canchas disponibles.
                    </p>

                    <hr>



                    <h5>
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        Dirección
                    </h5>

                    <p>
                        12400 Montevideo, Uruguay
                    </p>



                    <h5>
                        <i class="bi bi-clock-fill me-2"></i>
                        Horarios
                    </h5>

                    <p>
                        Lunes a Domingo: 08:00 - 23:00
                    </p>



                    <h5>
                        <i class="bi bi-car-front-fill me-2"></i>
                        Cómo llegar
                    </h5>

                    <p>
                        Usa el mapa o abre en Google Maps para rutas.
                    </p>



                    <a href="https://www.google.com/maps/search/?api=1&query=-34.764738,-56.215859"
                       target="_blank"
                       class="btn btn-success w-100 mt-2">

                        Abrir en Google Maps

                    </a>

                </div>

            </div>

        </div>



        <!-- CERCANAS -->

        <div class="row mt-5 g-3">



            <div class="col-md-4">

                <div class="card shadow-sm p-3 text-center">

                
                </div>

            </div>



            <div class="col-md-4">

                <div class="card shadow-sm p-3 text-center">

            
                </div>

            </div>



            <div class="col-md-4">

                <div class="card shadow-sm p-3 text-center">


                </div>

            </div>

        </div>

    </section>



    <!-- NOTICIAS -->

    <section id="noticias">

        <h1>
            Noticias
        </h1>

        <p>
            Mantente informado sobre eventos, torneos y novedades deportivas.
        </p>

        <img src="Recursos/Noticias/noticias.svg"
             alt="Noticias">

    </section>



    



    <!-- RESEÑAS -->

    <section id="resenas">

        <h1>
            Reseñas
        </h1>

        <p>
            Descubre las opiniones de nuestros usuarios y comparte tu experiencia.
        </p>



        <!-- CONTENEDOR DE LAS 10 RESEÑAS -->

        <div class="resenas-container">



            <!-- RESEÑA 1 -->

            <div class="resena">

                <img src="Recursos/Reseñas/Reseña1.svg?v=2"
                    alt="Reseña 1">

            </div>

        </div>

    </section>



    <!-- MODAL LOGIN -->

    <div class="modal fade"
         id="loginModal"
         tabindex="-1"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">



                <div class="modal-header">

                    <h5 class="modal-title">
                        Iniciar Sesión
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Cerrar">
                    </button>

                </div>



                <div class="modal-body">

                    <?php include 'login.php'; ?>

                </div>

            </div>

        </div>

    </div>



    <!-- JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/scroll.js"></script>



</body>

</html>

