<?php
namespace Model;

class Moto extends ActiveRecord{
    
    protected static $tabla = 'motos';
    protected static $columnasDB = ['id', 'nombre', 'vim', 'motor', 'dua', 'color','peso','estado','imagen'];

    public $id;
    public $nombre;
    public $vim;
    public $motor;
    public $dua;
    public $color;
    public $peso;
    public $estado;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->vim = $args['vim'] ?? '';
        $this->motor = $args['motor'] ?? '';
        $this->dua = $args['dua'] ?? '';
        $this->color = $args['color'] ?? '';
        $this->peso = $args['peso'] ?? '';
        $this->estado = $args['estado'] ?? '';
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