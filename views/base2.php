
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
       <ul class="navbar-nav" id="navbar-nav">
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

            <li class="nav-item ">
                <a href="" class="nav-link navlink" data-paso="0">
                    <i class='bx bxs-dashboard bx-icon'></i>
                    <span class="span">Dashboard</span>
                    <i class='bx bxs-right-arrow bx-arrow'></i>
                </a>

                <div class="nav-caja caja-query" >
                    <div class="nav-caja-items">
                        <h6>Custom Components:</h6>
                        <a href="">Buttons</a>
                        <a href="">Card</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link navlink" data-paso="1">
                    <i class='bx bxs-dashboard bx-icon'></i>
                    <span class="span">Dashboard</span>
                    <i class='bx bxs-right-arrow bx-arrow'></i>
                </a>

                <div class="nav-caja caja-query" >
                    <div class="nav-caja-items">
                        <h6>Custom Components:</h6>
                        <a href="">Buttons</a>
                        <a href="">Card</a>
                    </div>
                </div>
            </li>
            
            <hr class="siderbar-divider">

            <div class="sidebar-heading">Addons</div>

            <li class="nav-item">
                <a href="" class="nav-link navlink" data-paso="2">
                    <i class='bx bxs-dashboard bx-icon'></i>
                    <span class="span">Dashboard</span>
                    <i class='bx bxs-right-arrow bx-arrow'></i>
                </a>

                <div class="nav-caja caja-query" >
                    <div class="nav-caja-items">
                        <h6>Custom Components:</h6>
                        <a href="">Buttons</a>
                        <a href="">Card</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class='bx bxs-dashboard bx-icon'></i>
                    <span class="span">Dashboard</span>
                </a>
                
            </li>
            <hr class="siderbar-divider">

            <div class="lateral" >
                <i class='bx bx-arrow-from-right' id="lateral"></i>
            </div>
       </ul> <!--FIN NAVBAR-->

       <div class="contenedor" > <!--INCIO CONTENIDO-->

           <header class="header">
                <nav class="navbar">
                    <button id="menu" class="menu">
                        <i class='bx bx-menu'></i>
                    </button>
                    <ul class="navbar-ul">
                        <li class="nav-item-li">
                            <a href="" class="nav-link-li" id="nav-mensaje">
                                <i class='bx bxs-message-alt-detail bx-nav-icon'></i>
                                <span class="span-li">3</span>
                            </a>
                            <div class="mensajes" id="mensajes">
                                <h6>Centro de Mensaje</h6>
                                <a href="" class="mensaje-flex">
                                    <img src="imagenes/autor.svg" alt="">
                                    <div class="info-mensajes">
                                        <div class="texto-truncado">Hola que tal! Te hablo para informarte sobre el pedido de....</div>
                                        <div class="autor">Marco</div>
                                    </div>
                                </a>
                                <a href="" class="mensaje-flex">
                                    <img src="imagenes/autor2.svg" alt="">
                                    <div class="info-mensajes">
                                        <div class="texto-truncado">Hola Angel! Puedes revisar el pedido del señor...</div>
                                        <div class="autor">Raissa</div>
                                    </div>
                                </a>
                                <a href="" class="mensaje-flex">
                                    <img src="imagenes/autor3.svg" alt="">
                                    <div class="info-mensajes">
                                        <div class="texto-truncado">Que tal! Tengo un pedido para entregar hoy a las ...</div>
                                        <div class="autor">Rene</div>
                                    </div>
                                </a>
                            </div>
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