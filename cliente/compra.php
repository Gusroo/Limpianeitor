<?php

$server="localhost";
$db="id20544926_db";
$user="id20544926_dbl";
$pass="A1b2c3d4e5f6=12";

$conexion = mysqli_connect($server, $user, $pass, $db);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}

session_start();

$id = $_POST['idp'];
$Nombre = $_POST['nombrep'];
$Precio = $_POST['preciop'];
$Stock = $_POST['cantidadp'];
$Pedido = $_POST['pedido'];
$Subtotal = $Precio * $Pedido;

$producto = array($id, $Nombre, $Precio, $Stock, $Pedido, $Subtotal);

$consulta = "SELECT * FROM `productos` WHERE id_producto=$id";
$resultado = mysqli_query($conexion, $consulta);

$entrada = mysqli_fetch_array($resultado);

if($entrada['cantidad'] >= $Pedido) {

    if(isset($_SESSION["carrito"])) {
        $carrito = $_SESSION['carrito'];
    } else {
        $carrito = array();
    }

    $StocksAcu = 0;
    foreach($carrito as $pro) {
        if($pro['0'] == $id) {
            $StocksAcu += $pro['4'];
        }
    }

    $StocksAcu += $Pedido;

    if($Stock >= $StocksAcu) {
        array_push($carrito, $producto);
        $_SESSION["carrito"] = $carrito;
        header("location: ../cliente.php");
    } else {
        header("location: ../cliente.php?m=1");
    }
} else {
    header("location: ../cliente.php?m=1");
}

?>