<?php
//$servername = "localhost";
//$database = "id20544926_sistema";
//$username = "id20544926_limpianeitor";
//$password = "2uc|b]vor8+\J]mR";
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

$consulta = "UPDATE productos SET cantidad=$stock where id_producto='$id_stock'";
$resultado = mysqli_query($conexion, $consulta);

echo 
'<script>
    alert("¡Producto modificado con exito!");
    window.location.href="producto.php"
</script>';

?>