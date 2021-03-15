<?php
include "DAOUsuario.php";
class Usuario
{
    private $id;
    private $nombre;
    private $password;
    private $correo;
    private $creacion;
    private $permisos;



    public function __construct($id="", $nombre="", $password="", $correo="", $permisos="", $foto_perfil="")
    {
        $this->id=$id;
        $this->nombre = $nombre;
        $this->password=$password;
        $this->correo = $correo;
        $this->permisos = $permisos;
        $this->foto_perfil = $foto_perfil;
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
    }




    /**
     * Get the value of permisos
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Set the value of permisos
     *
     * @return  self
     */
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;

        return $this;
    }

    /**
     * Get the value of foto_perfil
     */
    public function getFoto_perfil()
    {
        return $this->foto_perfil;
    }

    /**
     * Set the value of foto_perfil
     *
     * @return  self
     */
    public function setFoto_perfil($foto_perfil)
    {
        $this->foto_perfil = $foto_perfil;

        return $this;
    }


 
    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function insertar()
    {
        DAOUsuario::insertarUsuario($this);
    }
    public function updateUsuario()
    {
        DAOUsuario::actualizarUsuario($this);
    }

    public function eliminarUsuario()
    {
        DAOUsuario::eliminarUsuario($this);
    }

    public function llenarObj($param)
    {
        // var_dump($param);
        // echo $param["_id"]['$oid'];
        // echo gettype($param);

        
        if (gettype($param)==="array") {
            // echo $param['_id']['$oid'];
            $this->id = $param['_id']['$oid'];
            $this->nombre = $param["nombre"];
            // $this->password = $param["password"];
    
            if (isset($param["password"])) {
                $this->password=$param["password"];
            } else {
                $this->password="Null";
            }
    
    
            $this->correo = $param["correo"];
            if (isset($param["permisos"])) {
                $this->permisos=$param["permisos"];
            } else {
                $this->permisos="Null";
            }
            if (isset($user["foto_perfil"])) {
                $this->foto_perfil=$param["foto_perfil"];
            } else {
                $this->foto_perfil="Null";
            }
        } elseif (gettype($param)==="object") {
            $this->id = $param->getId()['$oid'];
            $this->nombre = $param->getNombre();
            // $this->password = $param["password"];
    
            if ($param->getPassword()) {
                $this->password=$param->getPassword();
            } else {
                $this->password="Null";
            }
    
    
            $this->correo = $param->getCorreo();
            if ($param->getPermisos) {
                $this->permisos=$param->getPermisos();
            } else {
                $this->permisos="Null";
            }
            if ($param->getFoto_perfil()) {
                $this->foto_perfil=$param->getFoto_perfil();
            } else {
                $this->foto_perfil="Null";
            }
        }
    }


    public static function obtenerUsuarios()
    {
        $userResult=  DAOUsuario::obtenerUsuarios();

        $usersArray = array();

        // var_dump($userResult);
        // var_dump($userResult);

        // echo gettype($userResult);

        foreach ($userResult as $userInArray) {
            $user=json_decode(json_encode($userInArray), true);
            $userObj = new Usuario();

            $userObj->setId($user["_id"]);
            $userObj->setNombre($user["nombre"]);
            $userObj->setPassword($user["password"]);
            $userObj->setCorreo($user["correo"]);

            if (isset($user["permisos"])) {
                $userObj->setPermisos($user["permisos"]);
            } else {
                $userObj->setPermisos("Null");
            }
            if (isset($user["foto_perfil"])) {
                $userObj->setFoto_perfil($user["foto_perfil"]);
            } else {
                $userObj->setFoto_perfil("Null");
            }
           
           
            array_push($usersArray, $userObj);
        }


        return $usersArray;
    }


    public static function obtenerPorId($id)
    {
        $mongoUser = DAOUsuario::obtenerUsuario($id);
        $userParsed=json_decode(json_encode($mongoUser->toArray()), true);
        
     
        $user= new Usuario();
        $user->llenarObj($userParsed[0]);
        

        // var_dump($user);

        return $user;
    }

    

    public function imprimirUsuario()
    {
        $num = rand(0, 99999);
        $txt="<div id=".$num." class='user-container'>";
        $txt.="<span>".$this->getNombre()."</span>";
        $txt.="<span>".$this->getCorreo()."</span>";
        $txt.="<span>".$this->getPermisos()."</span>";
        $txt.="<a href='perfil.php?id=".$this->getId()['$oid']."'>Perfil de Usuario</a>";
        $txt.="<a href='actualizarUsuario.php?id=".$this->getId()['$oid']."'>Actualizar Usuario</a>";
        $txt.="<button  type='button' class='btn btn-danger' onclick='borrarUser(`".$this->getId()['$oid']."`,".$num.")'>Eliminar</button>";
        // $txt.="<a class='red-a' onclick='borrarUser(".$this->getId()['$oid'].") href='#'>Eliminar</a>";
        $txt.="</div>";
        

        return $txt;
    }

    public function imprimirUsuarioDetalle()
    {
        $txt="<div class='user-detalle'>";
        $txt.="<p>".$this->getNombre()."</p>";
        $txt.="<p>".$this->getCorreo()."</p>";
        $txt.="<p>".$this->getPermisos()."</p>";
        $txt.="</div>";
        

        return $txt;
    }


    public function imprimirFormUsuario()
    {
        $txt="<ul class='listaFormulario'>";
        $txt.="<li><label for='id'></label><input value='".$this->getId()."' type='hidden' name='id'></li>";
        $txt.="<li><label for='nombre'>Nombre</label><input value='".$this->getNombre()."' type='text' name='nombre'></li>";
        $txt.="<li><label for='correo'>Correo</label><input value='".$this->getCorreo()."' type='email' name='correo'></li>";
        $txt.="<li><label for='permisos'>Permisos</label><input value='".$this->getPermisos()."' type='text' name='permisos'></li>";
        $txt.="<input type='submit'>";
        $txt.="</ul>";


        return $txt;
    }
}
