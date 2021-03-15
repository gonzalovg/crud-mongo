<?php

include "model/Usuario.php";


$id = addslashes($_GET['id']);


$usuario = Usuario::obtenerPorId($id);

$usuario->eliminarUsuario();
