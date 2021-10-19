<main class="main">
    <h2 class="main-titulo">Dashboard</h2>

    <div class="gestion-articulo">
        <div class="gestion-titulo">
            <h3>!Bienvenido!</h3>
        </div>
        <div class="gestion-caja">
            <p class="mensaje">Bienvenido al Sistema de Gestión Logística de la Empresa Profesionales Coseca SAC. La función principal de este sistema es el control de Inventario de los distintos Almacenes llegando a una integración. A continuación se mostrarán algunos accesos directos para facilitar el uso del sistema.</p>
        </div>
    </div>

    <div class="contenedor-accesos">
        <a href="/logistica/inventario-articulos">
            <div class="acceso-articulo">
                <div class="acceso-titulo">
                    <h3 class="text-center verde">Inventario Artículos</h3>
                </div>
                <div class="acceso-caja verde">
                    <i class='bx bxl-dropbox icono-caja'></i>
                </div>
            </div>
        </a>
        <a href="/logistica/inventario-motos">
            <div class="acceso-articulo">
                <div class="acceso-titulo">
                    <h3 class="text-center rojo">Inventario Motos</h3>
                </div>
                <div class="acceso-caja rojo">
                    <i class='bx bx-cycling icono-caja'></i>
                </div>
            </div>
        </a>
        <a href="/logistica/inventario-placas">
            <div class="acceso-articulo">
                <div class="acceso-titulo">
                    <h3 class="text-center">Inventario Placas</h3>
                </div>
                <div class="acceso-caja">
                    <i class='bx bx-barcode icono-caja'></i>
                </div>
            </div>
        </a>
    </div>
    
    <div class="gestion-articulo">
        <div class="gestion-titulo">
            <h3>Graficas</h3>
        </div>
        <div class="gestion-caja">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
   
</main>