<?php

class metodos
{
    public function MostrarDatos($sql)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $result = mysqli_query($conexion, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    
    public function InsertarDatos($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $datosContra = md5($datos[1]);

        $sql = "INSERT into clientes (Clien_User,Clien_Contra,Clien_Nombre,Clien_Apellido)
         values ('$datos[0]','$datosContra','$datos[2]','$datos[3]')";

        return $result = mysqli_query($conexion, $sql);
    }

    public function ActualizarDatos($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE clientes set  Clien_User ='$datos[0]',
        Clien_Contra='$datos[1]',
        Clien_Nombre='$datos[2]',
        Clien_Apellido='$datos[3]'
        where Clien_User='$datos[4]'";
        return $result = mysqli_query($conexion, $sql);
    }

    public function EliminarDatos($id)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "DELETE FROM clientes where Clien_User='$id'";
        return $result = mysqli_query($conexion, $sql);
    }
}
