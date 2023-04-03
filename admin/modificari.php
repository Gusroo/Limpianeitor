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

$id_stock = $_POST['id_stock'];
$stock = $_POST['cstock'];

$consulta = "UPDATE insumos SET cantidad=$stock where id_insumo='$id_stock'";
$resultado = mysqli_query($conexion, $consulta);

echo 
'<script>
    alert("¡Insumo modificado con exito!");
    window.location.href="../admin.php"
</script>';

?>