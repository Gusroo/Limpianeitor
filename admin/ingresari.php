<?php
$server="localhost";
$db="id20544926_db";
$user="id20544926_dbl";
$pass="A1b2c3d4e5f6=12";

$conexion = mysqli_connect($server, $user, $pass, $db);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}

$Nom = $_POST['nombrei'];
$Cant = $_POST['cantidad'];

$consulta = "INSERT INTO `insumos` (`nombre`, `cantidad`) VALUES ('$Nom',$Cant)";
mysqli_query($conexion, $consulta);

echo 
'<script>
    alert("¡Insumo registrado con exito!");
    window.location.href="../admin.php"
</script>';

?>