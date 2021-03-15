<?php

class Connection
{
    // public function __construct()
    // {
    //     try {
    //         $this->enlace = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    //     } catch (MongoDB\Driver\Exception\Exception $e) {
    //         echo $e;
    //     }
    // }


    public static function getConnection()
    {
        return new MongoDB\Driver\Manager("mongodb://localhost:27017")  ;
    }
}
