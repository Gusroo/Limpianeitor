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

$Nom = $_POST['nombre'];
$Ape = $_POST['apellido'];
$CI = $_POST['cedula'];
$Mail = $_POST['correo'];
$Telf = $_POST['telefono'];
$Pass = $_POST['clave'];

$Comando = "INSERT INTO `usuario`(`nombre`, `apellido`, `cedula`, `correo`, `telefono`, `clave`, `id_rol`) VALUES ('$Nom','$Ape',$CI,'$Mail',$Telf,'$Pass',3)";
$resultado = mysqli_query($conexion, $consulta);

$entrada = mysqli_fetch_array($resultado);

if ($entrada['id_rol']==3) {
    echo '<script language="javascript">alert("¡Registro completado con exito!");</script>';
    include("index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

?>