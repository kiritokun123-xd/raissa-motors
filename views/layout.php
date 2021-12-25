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
                <li><a href="">Repuestos</a></li>
                <li><a href="">Fábrica</a></li>
            </ul>
        </nav>
    </header>
    <header class="header-flotante">

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
                <li><a href="">Repuestos</a></li>
                <li><a href="">Fábrica</a></li>
            </ul>
        </nav>
    </header>
    

    
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
    <h2>footer</h2>
</footer>
</html>