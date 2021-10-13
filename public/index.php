<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LogisticaController;
use Controllers\DashboardController;
use Controllers\TiendaController;
use Controllers\EnsamblajeController;
use Controllers\SoldaduraController;

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

use Controllers\LoginController;

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
//ZONA LOGISTICA
$router->get('/logistica/inventario-articulos',[LogisticaController::class, 'invarticulo']);
$router->post('/logistica/inventario-articulos',[LogisticaController::class, 'invarticulo']);
$router->get('/logistica/nuevo-articulo',[LogisticaController::class, 'newarticulo']);
$router->post('/logistica/nuevo-articulo',[LogisticaController::class, 'newarticulo']);
$router->get('/logistica/actualizar-articulo',[LogisticaController::class, 'updarticulo']);
$router->post('/logistica/actualizar-articulo',[LogisticaController::class, 'updarticulo']);

$router->get('/logistica/inventario-motos',[LogisticaController::class, 'invmoto']);
$router->get('/logistica/nueva-moto',[LogisticaController::class, 'newmoto']);
$router->post('/logistica/nueva-moto',[LogisticaController::class, 'newmoto']);
$router->get('/logistica/actualizar-moto',[LogisticaController::class, 'updmoto']);
$router->post('/logistica/actualizar-moto',[LogisticaController::class, 'updmoto']);

$router->get('/logistica/inventario-placas',[LogisticaController::class, 'invplaca']);
$router->get('/logistica/nueva-placa',[LogisticaController::class, 'newplaca']);
$router->post('/logistica/nueva-placa',[LogisticaController::class, 'newplaca']);
$router->get('/logistica/actualizar-placa',[LogisticaController::class, 'updplaca']);
$router->post('/logistica/actualizar-placa',[LogisticaController::class, 'updplaca']);

//=======TIENDA=============//

$router->get('/tienda/inventario',[TiendaController::class, 'inventario']);
$router->get('/tienda/actualizar-stock',[TiendaController::class, 'updinventario']);
$router->post('/tienda/actualizar-stock',[TiendaController::class, 'updinventario']);
//=======ENSAMBLAJE=============//

$router->get('/ensamblaje/inventario',[EnsamblajeController::class, 'inventario']);
$router->get('/ensamblaje/actualizar-stock',[EnsamblajeController::class, 'updinventario']);
$router->post('/ensamblaje/actualizar-stock',[EnsamblajeController::class, 'updinventario']);
//=======SOLDADURA=============//

$router->get('/soldadura/inventario',[SoldaduraController::class, 'inventario']);
$router->get('/soldadura/actualizar-stock',[SoldaduraController::class, 'updinventario']);
$router->post('/soldadura/actualizar-stock',[SoldaduraController::class, 'updinventario']);

//==========================zona ajax=================
$router->post('/ajax/invarticuloAjax',[LogisticaController::class, 'invarticuloajax']);
$router->post('/ajax/invarticuloAjaxId',[LogisticaController::class, 'invarticuloajaxid']);
$router->post('/ajax/stockarticuloAjax',[LogisticaController::class, 'stockarticuloajax']);
$router->post('/ajax/invmotoAjaxId',[LogisticaController::class, 'invmotoajaxid']);
$router->post('/ajax/invmotoAjax',[LogisticaController::class, 'invmotoajax']);
$router->post('/ajax/invplacaAjaxP',[LogisticaController::class, 'invplacaajaxp']);
$router->post('/ajax/invplacaAjaxN',[LogisticaController::class, 'invplacaajaxn']);
$router->post('/ajax/invtienda',[TiendaController::class, 'invtienda']);
$router->post('/ajax/invtiendaN',[TiendaController::class, 'invtiendaN']);
$router->post('/ajax/invensamblaje',[EnsamblajeController::class, 'invensamblaje']);
$router->post('/ajax/invensamblajeN',[EnsamblajeController::class, 'invensamblajeN']);
$router->post('/ajax/insoldadura',[SoldaduraController::class, 'invsoldadura']);
$router->post('/ajax/insoldaduraN',[SoldaduraController::class, 'invsoldaduraN']);

// AUTENTIFICAION
$router->get('/login',[LoginController::class,'login']);
$router->post('/login',[LoginController::class,'login']);
$router->get('/logout',[LoginController::class,'logout']);



$router->comprobarRutas();