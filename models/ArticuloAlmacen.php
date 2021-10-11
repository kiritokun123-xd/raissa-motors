<?php
namespace Model;

use mysqli;

class ArticuloAlmacen extends ActiveRecord{
    
    protected static $tabla = 'articuloalmacen';
    protected static $columnasDB = ['articuloId', 'almacenId', 'stock',];
    protected static $redireccion = '/logistica/inventario-articulos';

    public $articuloId;
    public $almacenId;
    public $stock;

    public function __construct($args = [])
    {
        $this->articuloId = $args['articuloId'] ?? '';
        $this->almacenId = $args['almacenId'] ?? '';
        $this->stock = $args['stock'] ?? '';
    }
    public function crearStock(){
        
        $query = "SELECT MAX(id) AS id FROM articulos";
        
        $resultado  = self::$db->query($query);  
        
        $id = mysqli_fetch_assoc($resultado)['id'];

        $query = "INSERT INTO articuloalmacen (articuloId, almacenId, stock) VALUES 
        (". $id .",1,0),(". $id .",2,0),(". $id .",3,0);";

        $resultado  = self::$db->query($query); 

        if($resultado){
            //REDIRECIONAR AL USUARIO
            header('Location: '. static::$redireccion .'?resultado=1');
        }
        
    }
}