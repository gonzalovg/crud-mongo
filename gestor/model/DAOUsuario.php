<?php
// include("../Connection.php");
// require "../Connection.php";
include "Connection.php";



class DAOUsuario
{
    private $con= null;
   


    public static function insertarUsuario($user)
    {
        $db = Connection::getConnection();
        $bulk = new MongoDB\Driver\BulkWrite;
        // $connection= new MongoDB\Driver\Manager("mongodb://localhost:27017");
        // db.members.createIndex( { "user_id": 1 }, { unique: true } )
        //https://www.es.w3ki.com/mongodb/mongodb_autoincrement_sequence.html
        $bulk->insert(["nombre"=>$user->getNombre(),"correo"=>$user->getCorreo(),"password"=>md5($user->getPassword()),"permisos"=>1]);
        
        
        $db->executeBulkWrite("crudphp.usuarios", $bulk);
        // $_POST["nombre"], $_POST["password"], $_POST["user-email"], "", "hola.png"
    }

    public static function actualizarUsuario($user)
    {
        // $db = Connection::getConnection();
        // $bulk = new MongoDB\Driver\BulkWrite;

        // $filter = ['_id' => new MongoDB\BSON\ObjectId($user['$oid'])];

        // echo $user['$oid'];
        // $collation = ['$set' => ['nombre' => $user["nombre"], 'correo' => $user["correo"], 'permisos' => $user["permisos"]]];
        // $bulk->update($filter, $collation);

        // $db->executeBulkWirte("crudphp.usuarios", $bulk);

        $db = Connection::getConnection();
        $bulk = new MongoDB\Driver\BulkWrite;

        $filter = ['_id' => new MongoDB\BSON\ObjectId($user->getId())];
        $collation = ['$set' => ['nombre' => $user->getNombre(), 'correo' => $user->getCorreo(), 'permisos' => $user->getPermisos()]];
        $bulk->update($filter, $collation);

        $db->executeBulkWrite("crudphp.usuarios", $bulk);
    }

    public static function eliminarUsuario($user)
    {
        echo $user->getId();
        $db = Connection::getConnection();
        $bulk = new MongoDB\Driver\BulkWrite;
        $filter = ['_id' => new MongoDB\BSON\ObjectId($user->getId())];
        $bulk->delete($filter, ['limit' => 0]);
        $db->executeBulkWrite('crudphp.usuarios', $bulk);
    }

    public static function obtenerUsuario($id)
    {
        $id = new \MongoDB\BSON\ObjectId($id);
        
        $filter = ["_id" => $id];
        $options=[];
        $con = Connection::getConnection();
        $query = new MongoDB\Driver\Query($filter, $options);

        // $result = $con->executeQuery("crudphp.usuarios", $query);
        return $con->executeQuery("crudphp.usuarios", $query);
    }

    public static function obtenerUsuarios()
    {
        $filter = [];
        $con = Connection::getConnection();
        $query = new MongoDB\Driver\Query($filter);
        return $con->executeQuery("crudphp.usuarios", $query);
    }
}
