<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$server="localhost";
$db="id20544926_db";
$user="id20544926_dbl";
$pass="A1b2c3d4e5f6=12";

$conexion = mysqli_connect($server, $user, $pass, $db);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}

$Nom = $_POST['nombre'];
$Ape = $_POST['apellido'];
$CI = $_POST['cedula'];
$Mail = $_POST['correo'];
$Telf = $_POST['telefono'];
$Pass = $_POST['clave'];
$id = $_POST['id'];

$consulta = "INSERT INTO `usuario`(`nombre`, `apellido`, `cedula`, `correo`, `telefono`, `clave`, `id_rol`) VALUES ('$Nom','$Ape',$CI,'$Mail',$Telf,'$Pass',$id)";
mysqli_query($conexion, $consulta); 

echo 
'<script>
    alert("¡Usuario registrado con exito!");
    window.location.href="../admin.php"
</script>';


?>