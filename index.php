<?php

require_once("config.php");

//$root = new Usuario;
//$root->loadById(3);
//echo $root;

$lista = Usuario::getList();

echo json_encode($lista);
?>