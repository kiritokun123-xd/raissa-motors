<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raissa Motor's</title>
    <link rel="icon" href="../imagenes/icono.ico">
    <!--===BOX ICONS===-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="../build/css/app.css">
    <!-- CSS Carousel-->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!--==SWEET ALERT-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    
    <!-- <script src="sweetalert2.all.min.js"></script> -->

    <script src="../build/js/bundle.min.js"></script>
    <script src="../build/js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header class="header-layout">

        <a href="" class="marca">
            <div class="marca-ico">
                <img class="logo" src="../imagenes/logo.png" alt="Logo Raissamotors">
            </div>
            <div class="marca-text">
                
                <h2>RAISSAMOTOR'S</h2>
            </div>
            <img class="hamburger" id="hamburger" src="../imagenes/barras.png" alt="barra">
        </a>
        <nav class="navegador" id="navegador">
            <ul>
                <li><a href="">Inicio</a></li>
                <li><a href="">Nosotros</a></li>
                <li><a href="">Motocicletas</a></li>
                <li><a href="">Trimotos</a></li>
                <li><a href="">Accesorios</a></li>
                <li><a href="">Fábrica</a></li>
            </ul>
        </nav>
    </header>
    <div class="header-flotante">

        <a href="" class="marca">
            <div class="marca-ico">
                <img class="logo" src="../imagenes/logo.png" alt="Logo Raissamotors">
            </div>
            <div class="marca-text">
                
                <h2>RAISSAMOTOR'S</h2>
            </div>
            <img class="hamburger" id="hamburger2" src="../imagenes/barras.png" alt="barra">
        </a>
        <nav class="navegador" id="navegador2">
            <ul>
                <li><a href="">Inicio</a></li>
                <li><a href="">Nosotros</a></li>
                <li><a href="">Motocicletas</a></li>
                <li><a href="">Trimotos</a></li>
                <li><a href="">Accesorios</a></li>
                <li><a href="">Fábrica</a></li>
            </ul>
        </nav>
    </div>
    <div class="wp-flotante">
        <a class="wp" href="">
            <i class='bx bxl-whatsapp' ></i>
        </a>
    </div>

    
    <?php echo $contenido; ?>

    <script>
        const config = {
            type: "carousel",
            focusAt: 'center',
            autoplay: 2000,
            perView: 2,
            breakpoints:{
                768: {
                perView: 2
                },
                600: {
                perView: 1
                }
            }
        }
        
        new Glide('.glide', config).mount()
    </script>
</body>
<footer>
    <h2>Contáctanos</h2>
    <div class="contenedor-contacto">
        <div class="texto">
            <h4>Puedes comunicarte con nosotros a través de nuestras redes sociales o llamando al <span>939-485-217</span></h4>
        </div>
        <div class="links">
            <div class="link">
                <i class='bx bxl-facebook-circle'></i>
                <a href="https://www.facebook.com/raissamotors.sac/">Facebook</a>
            </div>
            <div class="link">
                <i class='bx bxl-facebook-circle'></i>
                <a href="https://www.facebook.com/raissamotors.sac/">Facebook</a>
            </div>
            <div class="link">
                <i class='bx bxl-facebook-circle'></i>
                <a href="https://www.facebook.com/raissamotors.sac/">Facebook</a>
            </div>
        </div>
    </div>
    <h2>Ubícanos</h2>
    <div class="contenedor-mapa">
        <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d487.9259317832596!2d-77.05916659325321!3d-11.946266631911397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf4ac3e487c25261d!2sRAISSA%20MOTOR&#39;S!5e0!3m2!1ses-419!2spe!4v1641503351745!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="info-contacto">
            <h3>¿Cómo llegar?</h3>
            <p>En el cruce de la Av. 22 de Agosto con Av. Universitaria frente al Mercado Modelo puerta 7, o dale click al boton como llegar. ¡Te esperamos!</p>
            <div class="icono-mapa">
                <i class='bx bx-map'></i>
                <h4>RAISSA MOTOR'S</h4>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Todos los derechos reservados RaissaMotors 2022</p>
    </div>
</footer>
</html>