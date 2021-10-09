<?php
namespace Model;

class Articulo extends ActiveRecord{
    
    protected static $tabla = 'articulos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'costo', 'venta', 'imagen'];

    public $id;
    public $nombre;
    public $descripcion;
    public $costo;
    public $venta;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->costo = $args['costo'] ?? '';
        $this->venta = $args['venta'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    // public function validar(){
    //     if(!$this->nombre){
    //         self::$errores[] = "El nombre es obligatorio";
    //     }
    //     if(!$this->apellido){
    //         self::$errores[] = "El apellido es obligatorio";
    //     }
    //     if(!$this->telefono){
    //         self::$errores[] = "El teléfono es obligatorio";
    //     }
    //     if(!preg_match('/[0-9]{9}/',$this->telefono)){
    //         self::$errores[] = "Formato no válido";
    //     }

    //     return self::$errores;
    // }
}