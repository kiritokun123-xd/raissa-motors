<?php
namespace Model;

class Indicador2 extends ActiveRecord{
    
    protected static $tabla = 'indicador2';
    protected static $columnasDB = ['id', 'fecha', 'servicios', 'alquiler', 'personal', 'cost_alm', 'cost_uni','cost_uni_alm'];
    protected static $redireccion = '/dashboard';

    public $id;
    public $fecha;
    public $servicios;
    public $alquiler;
    public $personal;
    public $cost_alm;
    public $cost_uni;
    public $cost_uni_alm;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->servicios = $args['servicios'] ?? '';
        $this->alquiler = $args['alquiler'] ?? '';
        $this->personal = $args['personal'] ?? '';
        $this->cost_alm = $args['cost_alm'] ?? '';
        $this->cost_uni = $args['cost_uni'] ?? '';
        $this->cost_uni_alm = $args['cost_uni_alm'] ?? '';
    }
    public function validar(){
        if(!$this->fecha){
            self::$errores[] = "La fecha es obligatoria";
        }
        if(!$this->servicios){
            self::$errores[] = "La servicios son obligatoria";
        }
        if(!$this->alquiler){
            self::$errores[] = "El alquiler es obligatorio";
        }
        if(!$this->personal){
            self::$errores[] = "El personal es obligatorio";
        }
        if(!$this->cost_alm){
            self::$errores[] = "El costo de almacen es obligatorio";
        }
        if(!$this->cost_uni){
            self::$errores[] = "El costo unidad es obligatorio";
        }
        if(!$this->cost_uni_alm){
            self::$errores[] = "El índice es obligatorio";
        }

        return self::$errores;
    }

}