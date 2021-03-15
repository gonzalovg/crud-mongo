<?php
include "DAOUsuario.php";

$resultMany = DAOUsuario::obtenerUsuarios();
// $result1= DAOUsuario::obtenerUsuario("silvino@silvino.com");
$usuario= DAOUsuario::obtenerUsuario("6023af76f1180000b7006808");

// foreach ($resultMany as $document) {
//     var_dump(json_decode(json_encode($document)));
// }


// var_dump($result1, true);



//  var_dump($result1);
// foreach ($result1 as $document) {
//     var_dump(json_decode(json_encode($document), true));
// }

$usuarioMaestro=json_decode(json_encode($usuario->toArray()), true);




// $usuario->toArray();


// $prueba1 = json_decode(json_encode($usuarioMaestro), true);


// var_dump($usuarioMaestro);

// echo gettype($usuarioMaestro);
// var_dump($user);
var_dump($usuarioMaestro);


//Es mejor asi o de la forma anterior con el foreach??

// echo $prueba1[0]["nombre"];

echo $usuarioMaestro[0]["nombre"];
// var_dump($user(4));





// foreach ($user as $miniuser) {
//     print_r($miniuser);
// }

// var_dump($user["query"]);



// var_dump(json_decode($result1, true));
