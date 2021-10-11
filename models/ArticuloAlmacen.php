<?php
namespace Model;

class ArticuloAlmacen extends ActiveRecord{
    
    protected static $tabla = 'articuloalmacen';
    protected static $columnasDB = ['articuloId', 'almacenId', 'stock',];

    public $articuloId;
    public $almacenId;
    public $stock;

    public function __construct($args = [])
    {
        $this->articuloId = $args['articuloId'] ?? '';
        $this->almacenId = $args['almacenId'] ?? '';
        $this->stock = $args['stock'] ?? '';
    }

    // public function validar(){
    //     if(!$this->nombre){
    //         self::$errores[] = "El nombre es obligatorio";
    //     }
    //     if(!$this->costo){
    //         self::$errores[] = "El costo es obligatorio";
    //     }
    //     if(!$this->venta){
    //         self::$errores[] = "La venta es obligatoria";
    //     }

    //     return self::$errores;
    // }
}