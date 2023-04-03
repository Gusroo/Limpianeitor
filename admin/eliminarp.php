<?php
ob_start();

$server="localhost";
$db="id20544926_db";
$user="id20544926_dbl";
$pass="A1b2c3d4e5f6=12";

$conexion = mysqli_connect($server, $user, $pass, $db);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}

$id = $_POST['id'];

$consulta = "DELETE FROM productos where id_producto='$id'";
$resultado = mysqli_query($conexion, $consulta);

echo 
'<script>
    alert("¡Producto eliminado con exito!");
    window.location.href="../admin.php"
</script>';

?>