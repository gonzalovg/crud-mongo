<?php

include "model/Usuario.php";

$arrayUsers = Usuario::obtenerUsuarios();



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Gonzalo Verdugo">
    <script src="https://kit.fontawesome.com/b228dc2ea7.js" crossorigin="anonymous"></script>
    <script src="js/ajax.js"></script>
    <?php include "includes/head-back.php";?>
    <title>CRUD MONGO</title>
</head>

<body>
    <main>
        <?php include "includes/header.php" ?>
        <section>
            <div>
                <a href="insertarProducto.php">INTRODUCIR PRODUCTO</a>
            </div>
            <?php
            
            foreach ($arrayUsers as $user) {
                echo $user->imprimirUsuario();
            }


            ?>
        </section>
        <?php include "includes/footer.php"?>
    </main>
</body>

</html>