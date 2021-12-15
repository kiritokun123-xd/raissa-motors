<?php

function conectarDB() : mysqli{
    $db = new mysqli("localhost", "raissamo_bd1", "movistar16","raissamo_bd1");
    $db -> set_charset("utf8");
    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}
