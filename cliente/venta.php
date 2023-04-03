<?php 

session_start();

$carrito = $_SESSION['carrito'];
$total = $_SESSION['total'];

$server="localhost";
$db="id20544926_db";
$user="id20544926_dbl";
$pass="A1b2c3d4e5f6=12";

$conexion = mysqli_connect($server, $user, $pass, $db);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}

foreach($carrito as $p) {

    $prod = $p['0'];
    $cant = $p['4'];
    $subt = $p['5'];

    $Comando_v = "INSERT INTO `venta` (`fecha`, `producto`, `pedido`, `subtotal`, `total`) VALUES (CURDATE(), $prod, $cant, $subt, $total)";
    mysqli_query($conexion, $Comando_v);
}

foreach($carrito as $a) {

    $desc = $a['0'];

    $consulta = "SELECT * FROM `productos` WHERE id_producto=$desc";
    $resultado = mysqli_query($conexion, $consulta);

    $entrada = mysqli_fetch_array($resultado);

    if($entrada['0'] == $desc) {
        $result = $a['3'] - $a['4'];
        $consult = "UPDATE `productos` SET cantidad=$result WHERE id_producto=$desc";
        $resultado = mysqli_query($conexion, $consult);
    }
}

echo 
'<script>
    alert("¡Compra realizada con exito!");
    window.location.href="../cliente.php"
</script>';

session_destroy();

?>