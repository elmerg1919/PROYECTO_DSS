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

        $sql = "INSERT into slider (Categoria,Imagen,Estado)
         values ('$datos[0]','$datos[1]','$datos[2]')";

        return $result = mysqli_query($conexion, $sql);
    }

    public function ActualizarDatos($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE slider SET Categoria='$datos[1]', Estado='$datos[2]' WHERE Id = '$datos[0]'";

        return $result = mysqli_query($conexion, $sql);
    }

    public function EliminarDatos($id)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "DELETE FROM slider where Id='$id'";
        return $result = mysqli_query($conexion, $sql);
    }

    public function habilitarEmpleado($estado, $id)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "UPDATE imagenes SET Estado = ? WHERE Id = ?";
    }

    public function inhabilitarEmpleado($estado, $id)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "UPDATE imagenes SET Estado = ? WHERE Id = ?";
    }
}
