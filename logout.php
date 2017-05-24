<?php

session_start();
unset ($_SESSION['username']);
session_destroy();

echo "Adios :)";

header("refresh:3;url=login.php");

?>