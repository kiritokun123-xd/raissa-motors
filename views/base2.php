
<!DOCTYPE php>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raissa Motor's</title>
    <!--===BOX ICONS===-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    
    <div class="flex">
       <ul class="navbar">
            <a href="" class="sidebar-brand">
                <div class="sidebar-brand-icon">
                    <i class='bx bxl-mastodon'></i>
                </div>
                <div class="sidebar-brand-text">
                    RAISSAMOTOR'S
                </div>
            </a>

            <hr class="siderbar-divider">

            <li class="nav-item">
                <a href="nav-link">
                    <span>RAISSA MOTOR'S</span>
                </a>
            </li>
       </ul>
       <div class="contenedor">

           <header class="header">
                <p>header</p>
           </header>

           <div class="main">
               <?php echo $contenido; ?>
           </div>
       </div>
    </div>


    

    <script src="../build/js/bundle.min.js"></script>
</body>
</html>