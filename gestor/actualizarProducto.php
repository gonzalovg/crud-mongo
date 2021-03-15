<?php
include "model/Producto.php";


if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];

    $producto= Producto::obtenerPorId($id);
}


if (isset($_POST) && !empty($_POST)) {
    $rutaDeFoto="img/";
    $foto= $_FILES["img"];
    $nombreImg = $foto["name"][0];
    $nombreTmp = $foto["tmp_name"][0];
    move_uploaded_file($nombreTmp, $rutaDeFoto.$nombreImg);


    $producto = new Producto();
    //CHAPUZA
    $_POST["img"]= $nombreImg;
    $producto->llenarObjForm($_POST);
    // var_dump($_POST);

    // var_dump($foto);

    $producto->insertar();
    // header("location: tienda.php");
}






?>





<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Gonzalo Verdugo">
    <script src="js/validate.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
    <script src="https://kit.fontawesome.com/b228dc2ea7.js" crossorigin="anonymous"></script>
    <?php include "includes/head-back.php";?>
    <title>CRUD MONGO</title>
</head>

<body>
    <main>
        <?php include "includes/header.php" ?>
        <section>


            <div id="login-form">



                '<h1 class="text-center">INSERTA UN PRODUCTO</h1>


                <form
                    action="<?php echo $_SERVER["PHP_SELF"] ?>"
                    method="post" enctype="multipart/form-data">
                    <ul>
                        <li><label for="nombre">NOMBRE</label><input type="text"
                                value="<?php echo $producto->getNombre() ?>"
                                name="nombre"></li>
                        <li><label for="tipo">TIPO</label><input type="text" name="tipo"></li>
                        <li><label for="img">IMG</label><input type="file" name="img[]"></li>
                        <li><label for="info">DESCRIPCIÓN</label><textarea type="text" name="info"></textarea></li>
                        <input type="submit" value="INSERTAR">
                    </ul>
                </form>';





            </div>

        </section>
        <?php include "includes/footer.php"?>
    </main>
</body>

</html>