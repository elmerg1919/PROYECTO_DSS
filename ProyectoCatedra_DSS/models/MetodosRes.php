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

        $sql = "INSERT INTO reservacion(Res_Telefono,Clien_User,Res_Nombre,Res_Email, Res_Cantidad, Res_Fecha, Res_Hora) 
        VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";

        return $result = mysqli_query($conexion, $sql);
    }

    public function ActualizarDatos($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();

        $sql = "UPDATE reservacion SET Res_Telefono='$datos[0]',Clien_User='$datos[1]',Res_Nombre='$datos[2]',Res_Email='$datos[3]',Res_Cantidad='$datos[4]',Res_Fecha='$datos[5]',Res_Hora='$datos[6]' WHERE id_reserva = '$datos[7]'";
        return $result = mysqli_query($conexion, $sql);
    }

    public function EliminarDatos($id)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $sql = "DELETE FROM reservacion where id_reserva='$id'";
        return $result = mysqli_query($conexion, $sql);
    }
}
