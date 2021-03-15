<?php

include "model/Producto.php";

$id = addslashes($_GET['id']);

$producto = Producto::obtenerPorId($id);

$producto->eliminarProducto();
