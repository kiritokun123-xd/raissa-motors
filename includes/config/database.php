<?php

function conectarDB() : mysqli{
    $db = new mysqli("localhost", "root", "root","raissamotors");

    if(!$db){
        echo "Error no se pudo conectar";
        exit;
    }

    return $db;
}
