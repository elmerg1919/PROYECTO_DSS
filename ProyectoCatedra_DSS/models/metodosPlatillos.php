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

        $sql = "INSERT into platillo (Plat_Codigo,Plat_Nombre,Plat_Categoria,Plat_Imagen,plat_Descripcion,plat_Precio)
         values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]')";

        return $result = mysqli_query($conexion, $sql);
    }

    public function ActualizarDatos($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE platillo SET Plat_Nombre='$datos[0]',
        plat_Precio='$datos[1]',
        Plat_Categoria='$datos[2]',
        plat_Descripcion='$datos[3]',
        Plat_Imagen='$datos[4]'        
        where Plat_Codigo='$datos[5]'";
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
