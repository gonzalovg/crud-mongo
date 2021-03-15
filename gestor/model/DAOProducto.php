<?php
include "Connection.php";
class DAOProducto
{
    private $con= null;


    public static function insertarProducto($producto)
    {
        $db = Connection::getConnection();
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert(["nombre"=>$producto->getNombre(),"tipo"=>$producto->getTipo(),"info"=>$producto->getInfo(),"img"=>$producto->getImg()]);
        $db->executeBulkWrite("crudphp.productos", $bulk);
    }


    public static function actualizarProducto($producto)
    {
        $db = Connection::getConnection();
        $bulk = new MongoDB\Driver\BulkWrite;

        $filter = ['_id' => new MongoDB\BSON\ObjectId($producto->getId())];
        $collation = ['$set' => ["nombre"=>$producto->getNombre(),"tipo"=>$producto->getTipo(),"info"=>$producto->getInfo(),"img"=>$producto->getImg()]];
        $bulk->update($filter, $collation);

        $db->executeBulkWrite("crudphp.productos", $bulk);
    }


    public static function deleteProducto($producto)
    {
        echo "---------------";
        var_dump($producto);
        $db = Connection::getConnection();
        $bulk = new MongoDB\Driver\BulkWrite;
        $filter = ['_id' => new MongoDB\BSON\ObjectId($producto->getId())];
        $bulk->delete($filter, ['limit' => 0]);
        $db->executeBulkWrite('crudphp.productos', $bulk);
    }

    public static function obtenerProducto($id)
    {
        $id = new \MongoDB\BSON\ObjectId($id);
        
        $filter = ["_id" => $id];
        $options=[];
        $con = Connection::getConnection();
        $query = new MongoDB\Driver\Query($filter, $options);

        // $result = $con->executeQuery("crudphp.usuarios", $query);
        return $con->executeQuery("crudphp.productos", $query);
    }


    public static function obtenerProductos()
    {
        $filter = [];
        $con = Connection::getConnection();
        $query = new MongoDB\Driver\Query($filter);
        return $con->executeQuery("crudphp.productos", $query);
    }
}
