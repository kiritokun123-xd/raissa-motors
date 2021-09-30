
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
<body id="content">
    
    <div class="flex">
       <ul class="navbar-nav">
            <a href="" class="sidebar-brand">
                <div class="sidebar-brand-icon">
                    <i class='bx bxl-mastodon'></i>
                </div>
                <div class="sidebar-brand-text">
                    RAISSAMOTOR'S
                </div>
            </a>

            <hr class="siderbar-divider my-0">

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class='bx bxs-dashboard bx-icon'></i>
                    <span class="span">Dashboard</span>
                </a>
            </li>

            <hr class="siderbar-divider">

            <div class="sidebar-heading">Interface</div>

            <li class="nav-item">
                <a href="" class="nav-link" id="nav-link">
                    <i class='bx bxs-dashboard bx-icon'></i>
                    <span class="span">Dashboard</span>
                    <i class='bx bxs-right-arrow bx-arrow'></i>
                </a>

                <div class="nav-caja " id=nav-caja>
                    <div class="nav-caja-items">
                        <h6>Custom Components:</h6>
                        <a href="">Buttons</a>
                        <a href="">Card</a>
                    </div>
                </div>
            </li>
           
            <hr class="siderbar-divider">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class='bx bxs-dashboard bx-icon'></i>
                    <span class="span">Dashboard</span>
                </a>
                
            </li>
       </ul>
       <div class="contenedor" >

           <header class="header">
                <nav class="navbar">
                    <ul class="navbar-ul">
                        <li class="nav-item-li">
                            <a href="" class="nav-link-li">
                                <i class='bx bxs-message-alt-detail bx-nav-icon'></i>
                                <span class="span-li">7</span>
                            </a>
                        </li>
                        <div class="bloque-nav"></div>
                        <li class="nav-item-li">
                            <a href="" id="nav-link-li" class="nav-link-li">
                                <span class="name-link">Angelito</span>
                                <img src="imagenes/perfil.svg" class="img-perfil" alt="imagen del perfil">
                            </a>    
                            <div class="caja-perfil" id="caja-perfil">
                                <a href class="perfil-item">
                                    <i class='bx bxs-user'></i>
                                    <span>Perfil</span>
                                </a>
                                <a href class="perfil-item">
                                    <i class='bx bxs-wrench'></i>
                                    <span>Ajustes</span>
                                </a>
                                <a href class="perfil-item">
                                    <i class='bx bx-list-ul'></i>
                                    <span>Actividad</span>
                                </a>
                                
                                <div class="divider-perfil"></div>

                                <a href class="perfil-item">
                                    <i class='bx bx-log-out'></i>   
                                    <span>Salir</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
           </header>

           <div class="main">
               <?php echo $contenido; ?>
           </div>
       </div>
    </div>


    

    <script src="../build/js/bundle.min.js"></script>
</body>
</html>