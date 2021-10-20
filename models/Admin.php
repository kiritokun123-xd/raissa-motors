<?php
namespace Model;

class Admin extends ActiveRecord{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','nombre','password'];

    public $id;
    public $nombre;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validarPassword($passwordC){
        if($this->password != $passwordC){
            self::$errores[] = "Las contraseña no coinciden";
        }
    }

    public function crearusuario(){

        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

        //QUERY PARA CREAR AL USUARIO
        $query = "INSERT INTO usuarios (nombre, password) VALUES ('". $this->nombre ."','". $passwordHash ."')";
   
        $resultado = self::$db->query($query); 

    }
    public function actualizarusuario(){

        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

        //QUERY PARA CREAR AL USUARIO
        $query = "UPDATE usuarios SET nombre = '". $this->nombre ."', password = '". $passwordHash ."' WHERE id = ". $this->id ."";
   
        $resultado = self::$db->query($query); 

        if($resultado){
            header('Location: /acceso/usuario?resultado=2');
        }
    }

    public function validar(){
        if(!$this->nombre){
            self::$errores[] = "El usuario es obligatorio";
        }
        if(!$this->password){
            self::$errores[] = "La contraseña es obligatoria";

        }

        return self::$errores;
    }

    public function existeUsuario(){
        $query = " SELECT * FROM " . self::$tabla . " WHERE nombre = '" . $this->nombre . "' LIMIT 1";

        $resultado = self::$db->query($query);  

        if(!$resultado->num_rows){
            self::$errores[] = "El usuario no Existe" ;
            return;
        }

        return $resultado;
    }

    public function comprobarResultado($resultado){
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);

        if(!$autenticado){
            self::$errores[] = "La contraseña es incorrecta";
        }

        return $autenticado;
    }

    public function autenticar(){
        session_start();

        //llenar arreglo de sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /dashboard');
    }
}
?>