<?php
include "DAOProducto.php";
class Producto
{
    private $id;
    private $nombre;
    private $info;
    private $tipo;
    private $img;


    public function __construct($id="", $nombre="", $info="", $tipo="", $img="")
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->info=$info;
        $this->tipo=$tipo;
        $this->img=$img;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }  /**
    * Get the value of info
    */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set the value of info
     *
     * @return  self
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }  /**
   * Get the value of tipo
   */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
    /**
  * Get the value of foto
  */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of Foto
     *
     * @return  self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    public function insertar()
    {
        DAOProducto::insertarProducto($this);
    }
    public function updateProducto()
    {
        DAOProducto::actualizarProducto($this);
    }
    public function eliminarProducto()
    {
        DAOProducto::deleteProducto($this);
    }
    public static function obtenerPorId($id)
    {
        $mongoProducto = DAOProducto::obtenerProducto($id);
        $productParsed=json_decode(json_encode($mongoProducto->toArray()), true);
        $producto= new Producto();
        $producto->llenarObjForm($productParsed[0]);
        

        // var_dump($producto);

        return $producto;
    }

    public static function obtenerProductos()
    {
        $resultProductos = DAOProducto::obtenerProductos();
        $arrayProductos= array();

        foreach ($resultProductos as $productInResult) {
            $producto=json_decode(json_encode($productInResult), true);
            $productoObj = new Producto();

            $productoObj->setId($producto["_id"]);
            $productoObj->setNombre($producto["nombre"]);
            $productoObj->setInfo($producto["info"]);
            $productoObj->setTipo($producto["tipo"]);
            $productoObj->setImg($producto["img"]);


          
           
    
            array_push($arrayProductos, $productoObj);
        }

        return $arrayProductos;
    }

    public function imprimirProductoCaja()
    {
        $num = rand(0, 99999);
        $txt="<div class='prod-wrapper' id=".$num.">";
        $txt.='<a href="detalleProducto.php?id='.$this->getId()['$oid'].'">';
        $txt.='<div  class="card" style="width: 18rem;">';
        $txt.='<img src="img/'.$this->getImg().'" class="card-img-top" alt="...">';
        $txt.='<div class="card-body">';
        $txt.='<p class="card-text"><b>'.$this->getNombre().'</b></p>';
        $txt.='</div>';
        $txt.='</div>';
        $txt.='<div class="prod-butt-cont"><a href="actualizarProducto.php?id='.$this->getId()['$oid'].'&option=2"><button type="button" class="btn btn-primary">ACTUALIZAR</button></a><button class="btn btn-danger" onclick="borrarProd(`'.$this->getId()['$oid'].'`,'.$num.')" type="button">ELIMINAR</button></div>';
        $txt.="</a>";
        $txt.="</div>";
        return $txt;
    }

    public function imprimirProductoDetalle()
    {
    }

    public function llenarObjForm($array)
    {
        if (isset($array["_id"]['$oid'])) {
            $this->id=$array["_id"]['$oid'];
        }
        $this->nombre=$array["nombre"];
        $this->info=$array["info"];
        $this->tipo=$array["tipo"];
        $this->img=$array["img"];
    }
}
