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

        $sql = "INSERT into platillo (Plat_Codigo,Plat_Nombre,Plat_Categoria,Plat_Imagen)
         values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";

        return $result = mysqli_query($conexion, $sql);
    }

    public function ActualizarDatos($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE platillo set  Plat_Codigo ='$datos[0]',
        Plat_Nombre='$datos[1]',
        Plat_Categoria='$datos[2]',
        Plat_Imagen='$datos[3]'
        where Plat_Codigo='$datos[4]'";
        return $result = mysqli_query($conexion, $sql);
    }

    public function EliminarDatos($id)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "DELETE FROM platillo where Plat_Codigo='$id'";
        return $result = mysqli_query($conexion, $sql);
    }
}
