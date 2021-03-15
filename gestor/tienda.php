<?php

include "model/Producto.php";

$arrayProductos = Producto::obtenerProductos();




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Gonzalo Verdugo">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <script src="js/validate.js"></script>
    <script src="js/ajax.js"></script>
    <script src="https://kit.fontawesome.com/b228dc2ea7.js" crossorigin="anonymous"></script>
    <?php include "includes/head-back.php";?>
    <title>CRUD MONGO</title>
</head>

<body>
    <main>
        <?php include "includes/header.php" ?>
        <section>
            <h1>tienda</h1>

            <div id="productos">
                <?php
            
            foreach ($arrayProductos as $producto) {
                echo $producto->imprimirProductoCaja();
            }


            ?>
            </div>
        </section>
        <?php include "includes/footer.php"?>
    </main>
</body>

</html>