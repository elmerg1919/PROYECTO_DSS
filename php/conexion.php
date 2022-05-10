<?php

class CONECTAR
{
    private $servidor = "localhost:3308";
    private $usuario = "root";
    private $bd = "restaurant";
    private $password = "";

    public function conexion()
    {
        $conexion = mysqli_connect(
            $this->servidor,
            $this->usuario,
            $this->password,
            $this->bd,
        );
        return $conexion;
    }
}
//PRUEBA DE CONEXION 
/*
$obj = new CONECTAR();
if ($obj->conexion()) {
    echo "simona la mona";
} else {
    echo "Nel sin conexion";
}*/

