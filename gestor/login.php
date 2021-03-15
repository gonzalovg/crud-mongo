<?php




?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Gonzalo Verdugo">
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
                    action="<?php $_SERVER['PHP_SELF'] ?>"
                    method="post">
                    <ul>
                        <li><label class="text-center" for="email">Email</label><input type="email" name="user-email">
                        </li>
                        <li><label class="text-center" for="password">Password</label><input type="password"
                                name="user-email"></li>
                        <li><input type="submit" value="Iniciar Sesión"></li>
                        <li><a href="registro.php" class="text-center">¿No tienes cuenta? Regístrate</a></li>
                    </ul>
                </form>

            </div>

        </section>
        <?php include "includes/footer.php"?>
    </main>
</body>

</html>