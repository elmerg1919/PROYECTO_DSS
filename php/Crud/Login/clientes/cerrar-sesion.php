<?php

session_start();
unset($_SESSION["id_username"]);
session_destroy();
header("Location: cliente.php");
exit;
