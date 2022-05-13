<?php

class MetodosEmpleados
{
    public function ingresarEmpleado($nombre, $username, $password, $correo, $dui, $fechanac, $numero, $genero, $cargo, $estado)
    {
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("INSERT INTO usuarios(nombre_usuario, id_username, usuario_contra, correo_usuario, dui, fecha_nacimiento, numero_telefono, genero, id_cargo, estado_usuario) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute(array($nombre, $username, $password, $correo, $dui, $fechanac, $numero, $genero, $cargo, $estado));
        Database::disconnect();
    }

    public function eliminarEmpleado($username)
    {
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("DELETE FROM usuarios WHERE id_username = ?");
        $query->execute(array($username));
        Database::disconnect();
    }

    public function actualizarEmpleado($password, $nombre, $correo, $dui, $fechanac, $numero, $genero, $cargo, $username)
    {
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("UPDATE usuarios SET usuario_contra = ?, nombre_usuario = ?, correo_usuario = ?, dui = ?, fecha_nacimiento = ?, numero_telefono = ?, genero = ?, id_cargo = ? WHERE id_username = ?");
        $query->execute(array($password, $nombre, $correo, $dui, $fechanac, $numero, $genero, $cargo, $username));
        Database::disconnect();
    }

    public function habilitarEmpleado($estado, $id)
    {
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("UPDATE usuarios SET estado_usuario = ? WHERE id_username = ?");
        $query->execute(array($estado, $id));
        Database::disconnect();
    }

    public function inhabilitarEmpleado($estado, $id)
    {
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("UPDATE usuarios SET estado_usuario = ? WHERE id_username = ?");
        $query->execute(array($estado, $id));
        Database::disconnect();
    }
}
