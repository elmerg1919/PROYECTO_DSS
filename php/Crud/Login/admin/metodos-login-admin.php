<?php

class MetodosLoginAdmin
{
    public function buscarUsuario($usuario, $correo, $pass, $estadoH)
    {
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("SELECT * FROM usuarios WHERE (id_username = ? OR correo_usuario = ?) AND usuario_contra = ? AND estado_usuario = ?");
        $query->execute(array($usuario, $usuario, $pass, $estadoH));
        Database::disconnect();

        //print_r($datos);
        if ($query->rowCount() == 1) {
            $_SESSION['id_username'] = $usuario;
            $_SESSION['intentos-admin'] = 0;
            header("Location: ../../Empleados/admin_home.php");
        } else {
            if (empty($_SESSION['intentos-admin'])) {
                $_SESSION['intentos-admin'] = 1;
            } else {
                if ($_SESSION['intentos-admin'] > 0) {
                    $_SESSION['intentos-admin'] += 1;
                } else {
                    $_SESSION['intentos-admin'] = 1;
                }
            }
            header("Location: admin.php?mensaje=Los datos ingresados no son correctos.");
        }
    }

    public function buscarUsuarioContra($correo, $username, $estadoH)
    {
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("SELECT * FROM usuarios WHERE correo_usuario = ? AND id_username = ? AND estado_usuario = ?");
        $query->execute(array($correo, $username, $estadoH));
        Database::disconnect();

        if ($query->rowCount() == 1) {
            $_SESSION['id_user_contra'] = $username;
            header("Location: nueva-contra.php");
        } else {
            header("Location: form-contra.php?mensaje=No existe un usuario con las credenciales ingresadas.");
        }
    }

    public function restablecerContrasenia($pass, $username)
    {
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("UPDATE usuarios SET usuario_contra = ? WHERE id_username = ?");
        $query->execute(array($pass, $username));
        Database::disconnect();
    }
}
