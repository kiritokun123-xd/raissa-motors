<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LogisticaController;
use Controllers\DashboardController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router = new Router();

//Zona privada
$router->get('/admin', [PropiedadController::class,'index']);

$router->get('/propiedades/crear', [PropiedadController::class,'crear']);
$router->post('/propiedades/crear', [PropiedadController::class,'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class,'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class,'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class,'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class,'crear']);
$router->post('/vendedores/crear', [VendedorController::class,'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class,'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class,'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class,'eliminar']);

//Zona pública
$router->get('/',[PaginasController::class, 'index']);
$router->get('/nosotros',[PaginasController::class, 'nosotros']);
$router->get('/propiedades',[PaginasController::class, 'propiedades']);
$router->get('/propiedad',[PaginasController::class, 'propiedad']);
$router->get('/blog',[PaginasController::class, 'blog']);
$router->get('/entrada',[PaginasController::class, 'entrada']);
$router->get('/contacto',[PaginasController::class, 'contacto']);
$router->post('/contacto',[PaginasController::class, 'contacto']);

//Zona Dashboard
$router->get('/dashboard',[DashboardController::class, 'inicio']);

$router->get('/logistica/inventario-articulos',[LogisticaController::class, 'invarticulo']);
$router->get('/logistica/nuevo-articulo',[LogisticaController::class, 'newarticulo']);
$router->get('/logistica/actualizar-articulo',[LogisticaController::class, 'updarticulo']);

$router->get('/logistica/inventario-motos',[LogisticaController::class, 'invmoto']);
$router->get('/logistica/nueva-moto',[LogisticaController::class, 'newmoto']);
$router->get('/logistica/actualizar-moto',[LogisticaController::class, 'updmoto']);

$router->get('/logistica/inventario-placas',[LogisticaController::class, 'invplaca']);

$router->get('/logistica/nueva-placa',[LogisticaController::class, 'newplaca']);

$router->get('/tienda/inventario',[LogisticaController::class, 'invtienda']);



$router->comprobarRutas();