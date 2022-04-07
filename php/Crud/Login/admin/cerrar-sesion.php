<?php

session_start();
unset($_SESSION["id_username"]);
session_destroy();
header("Location: admin.php");
exit;
