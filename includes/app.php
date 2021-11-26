<?php

require "funciones.php";
require "config/database.php";
require "../fpdf/fpdf.php";
define('FPDF_FONTPATH', '../fpdf/font/');
require __DIR__ . '/../vendor/autoload.php';

$db = conectarDB();

use Model\ActiveRecord;

ActiveRecord::setDB($db);

?>