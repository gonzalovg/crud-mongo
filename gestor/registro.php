<?php

include "model/Usuario.php";




if (isset($_POST) && !empty($_POST)) {
    $user = new Usuario("", $_POST["nombre"], $_POST["password"], $_POST["user-email"], "", "hola.png");
    $user->insertar();
    // session_start();

    header("location: ../index.php");
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
    <script src="https://kit.fontawesome.com/b228dc2ea7.js" crossorigin="anonymous"></script>
    <?php include "includes/head-back.php";?>
    <title>CRUD MONGO</title>
</head>

<body>
    <main>
        <?php include "includes/header.php" ?>
        <section>
            <div id="login-form">
                <form
                    action="<?php echo $_SERVER['PHP_SELF'] ?>"
                    method="post" id="formRegistro">
                    <ul>
                        <li><label class="text-center" for="nombre">Nombre</label><input type="text" name="nombre">
                        </li>
                        <li><label class="text-center" for="email">Email</label><input type="email" name="user-email">
                        </li>
                        <li><label class="text-center" for="password">Password</label><input type="password"
                                name="password"></li>
                        <li><label class="text-center" for="password-verify">Repetir pass</label><input
                                name="password-verify" type="password">
                        </li>
                        <li><input onclick="validar(1,'formRegistro')" type="button" value="Iniciar Sesión"></li>
                        <li><a href="login.php" class="text-center">¿Ya tienes cuenta? Inicia sesión</a></li>
                    </ul>
                </form>

            </div>

        </section>
        <?php include "includes/footer.php"?>
    </main>
</body>

</html>