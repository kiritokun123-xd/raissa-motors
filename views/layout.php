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
    <!-- <script src="sweetalert2.all.min.js"></script> -->

    <script src="../build/js/bundle.min.js"></script>
    <script src="../build/js/jquery-3.6.0.min.js"></script>
</head>
<body class="body-layout">
    <header>
        <h2>Raissa Motor's <label for="menu-toggle"><i class='bx bx-menu'></i></label></h2>

        <input type="checkbox" id="menu-toggle">
        <div class="main-menu">
            <div class="menu-responsive">
                <label for="menu-toggle">Close</label>
                <form action="" class="search">
                    <input type="search" placeholder="search store">
                    <button><i class='bx bx-search'></i></button>
                </form>
            </div>

            <a href="" class="">Download app</a>

            <a href="">Sign Up / Login</a>
        </div>
    </header>


    <?php echo $contenido; ?>

    <!-- JavaScript -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/easytimer@1.1.3/src/easytimer.min.js"></script>
    <script>
        var timer = new Timer();
        timer.start({countdown: true, startValues: {seconds: 1000}});
            document.querySelector('.values').innerHTML = timer.getTimeValues().toString();

        timer.addEventListener('secondsUpdated', function (e) {
            document.querySelector('.values').innerHTML = timer.getTimeValues().toString();
        });
    </script>
</body>
</html>