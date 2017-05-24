<?php
session_start();
include "conexion.php";

if (!$conn) {
 die("La conexion falló: " . mysql_connect_error());
}

$username = $_POST['usuario'];
$password = $_POST['contra'];
 
$sql = "SELECT * FROM printing_srv.users WHERE _username = '".$_POST['usuario']."' AND _pswd = '".$_POST['contra']."'";

$result = $conn->query($sql);


if (mysqli_num_rows($result) > 0) {     
 while($row = mysqli_fetch_assoc($result)){
 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);
}
 header('Location: subir.php');
 exit;
}
else{echo "Usuario o cotrasena erronea";}
    

 
 mysqli_close($conn); 
?>