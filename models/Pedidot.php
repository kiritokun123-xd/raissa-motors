<?php
namespace Model;
date_default_timezone_set("America/Phoenix");
class Pedidot extends ActiveRecord{
    
    protected static $tabla = 'pedidot';
    protected static $columnasDB = ['id', 'fecha_ini', 'cliente', 'fecha_ent', 'techo', 'mica', 'mascara', 'adicional'];
    protected static $redireccion = '/logistica/pedidoT';

    public $id;
    public $fecha_ini;
    public $cliente;
    public $fecha_ent;
    public $techo;
    public $mica;
    public $mascara;
    public $adicional;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha_ini = $args['fecha_ini'] ?? date('Y-m-d');
        $this->cliente = $args['cliente'] ?? '';
        $this->fecha_ent = $args['fecha_ent'] ?? '';
        $this->techo = $args['techo'] ?? '';
        $this->mica = $args['mica'] ?? '';
        $this->mascara = $args['mascara'] ?? '';
        $this->adicional = $args['adicional'] ?? '';
    }

    public function validar(){
        if(!$this->cliente){
            self::$errores[] = "El cliente es obligatorio";
        }
        if(!$this->fecha_ent){
            self::$errores[] = "La fecha de entrega es obligatoria";
        }
        if(!$this->techo){
            self::$errores[] = "El techo es obligatorio";
        }
        if(!$this->mica){
            self::$errores[] = "La mica es obligatoria";
        }
        if(!$this->mascara){
            self::$errores[] = "La mascara es obligatoria";
        }
        if(!$this->adicional){
            self::$errores[] = "El tapiz es obligatorio";
        }
        
        return self::$errores;
    }

}