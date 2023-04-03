<?php
$server="localhost";
$db="id20544926_db";
$user="id20544926_dbl";
$pass="A1b2c3d4e5f6=12";

$conexion = mysqli_connect($server, $user, $pass, $db);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}

error_reporting(0);

$correo = $_POST['correo'];
$clave = $_POST['clave'];

$consulta = "SELECT * FROM usuario where correo='$correo' AND clave='$clave'";
$resultado = mysqli_query($conexion, $consulta);

$entrada = mysqli_fetch_array($resultado);

if($entrada['id_rol']==1) { //Admin
    session_start();
    header("location:admin.php");

} else if($entrada['id_rol']==2) { //Supervisor
    header("location:supervisor.php");

} else if($entrada['id_rol']==3) { //Personal
    header("location:cliente.php");
} else {
    echo '<script language="javascript">alert("Error al ingresar al sistema. Por favor verifique los datos ingresados en intentelo nuevamente.");</script>';
    include("index.php");
}

?>