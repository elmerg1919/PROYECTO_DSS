<?php

class MetodosLoginCliente
{
    public function buscarCliente($usuario, $pass)
    {
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("SELECT * FROM clientes WHERE Clien_User = ? AND Clien_Contra = ?");
        $query->execute(array($usuario, $pass));
        $datos = $query->fetch();
        Database::disconnect();

        if ($query->rowCount() == 1) {
            $_SESSION['id_username'] = $usuario;
            $_SESSION['numTries'] = 0;
            header("Location: ../../views/Clientes/home.php");
        } else {
            if (empty($_SESSION['numTries'])) {
                $_SESSION['numTries'] = 1;
            } else {
                if ($_SESSION['numTries'] > 0) {
                    $_SESSION['numTries'] += 1;
                } else {
                    $_SESSION['numTries'] = 1;
                }
            }
            header("Location: ../../views/Clientes/clientes.php?mensaje=Las credenciales ingresadas no son correctas.");
        }
    }

    public function buscarClienteContra($username)
    {
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("SELECT * FROM clientes WHERE Clien_User = ?");
        $query->execute(array($username));
        Database::disconnect();

        if ($query->rowCount() == 1) {
            $_SESSION['id_user_contra'] = $username;
            header("Location: ../../views/Clientes/form_nueva_contra.php");
        } else {
            header("Location: ../../views/Clientes/form_recuperar_contra.php?mensaje=No existe un usuario con las credenciales ingresadas.");
        }
    }

    public function restablecerContrasenia($pass, $username)
    {
        $cnu = Database::connect();
        $cnu->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cnu->prepare("UPDATE clientes SET Clien_Contra = ? WHERE Clien_User = ?");
        $query->execute(array($pass, $username));
        Database::disconnect();
    }
}
