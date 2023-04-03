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

$Comando_c = "SELECT * from productos";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cliente | Limpianeitor</title>
</head>
<body>
    
    <header><h1>Cliente</h1></header>

    <div class="usuario">

    <br><br><br><h2><b class="subtitulo">Comprar productos</b></h2>

    <table class="tablap">
        <tr>
            <td class="b-b"><b>ID</b></td>
            <td class="b-b"><b>Producto</b></td>
            <td class="b-b"><b>Precio</b></td>
            <td class="b-b"><b>Stock</b></td>
            <td class="b-b"><b>Añadir</b></td>
        </tr>

        <?php
        
        $Resultado = mysqli_query($conexion, $Comando_c);

        while($Datos = mysqli_fetch_array($Resultado)) {
        
        ?>

        <tr>
            <td class="b-b"><?php echo $Datos['id_producto']?></td>
            <td class="b-b"><?php echo $Datos['nombre']?></td>
            <td class="b-b"><?php echo $Datos['precio']?>$</td>
            <td class="b-b"><?php echo $Datos['cantidad']?></td>
            <td class="b-b">
                <form action="cliente/compra.php" method="post">
                    <input type="hidden" name="idp" value="<?php echo $Datos['id_producto']?>">
                    <input type="hidden" name="nombrep" value="<?php echo $Datos['nombre']?>">
                    <input type="hidden" name="preciop" value="<?php echo $Datos['precio']?>">
                    <input type="hidden" name="cantidadp" value="<?php echo $Datos['cantidad']?>">
                    <input type="number" name="pedido" class="input-p" min=1 required>
                    <input type="submit" name="enviar" value="Añadir" class="btn-t">
                </form>
            </td>
        </tr>

        <?php
        }
        ?>
        
    </table><br><br>

    <?php
    
    if(isset($_GET["m"])) {
        $m = $_GET['m'];

        switch($m) {
            case 1: echo "<br>" . "<h3><p style='text-align:center'>No hay la cantidad suficiente en el inventario para el pedido.</p></h3>" . "<br>" . "<br>";
        }
    }
    
    ?>

    <?php

    if(isset($_SESSION['carrito'])) {
        $carrito = $_SESSION['carrito'];

        echo "<h1>Listado de compras</h1>";

        ?>

        <table class="tablap">
            <tr>
                <td class="b-b"><b>ID</b></td>
                <td class="b-b"><b>Producto</b></td>
                <td class="b-b"><b>Precio c/u</b></td>
                <td class="b-b"><b>Stock</b></td>
                <td class="b-b"><b>Cantidad encargada</b></td>
                <td class="b-b"><b>Subtotal</b></td>
                <td class="b-b"><b>Eliminar</b></td>
            </tr>

            <?php

            $Total = 0;
            $i = 0;

            foreach($carrito as $p) {

                $Total = $p['5'] + $Total;
            
            ?>

            <tr>
                <td class="b-b"><?php print_r($p['0'])?></td>
                <td class="b-b"><?php print_r($p['1'])?></td>
                <td class="b-b"><?php print_r($p['2'].'$')?></td>
                <td class="b-b"><?php print_r($p['3'])?></td>
                <td class="b-b"><?php print_r($p['4'])?></td>
                <td class="b-b"><?php print_r($p['5'].'$')?></td>
                <td class="b-b">
                    <?php echo "<a href='cliente/eliminarcar.php?in=$i' class='btn-t' style='text-decoration: none;'>Eliminar</a>"?>
                </td>
            </tr>

            <?php
            $i++;
            $_SESSION['total'] = $Total;
            };
            ?>

            <tr>
                <td class="b-b" colspan='5'>Total:</td>
                <td class="b-b" colspan='1'><?php echo $Total."$"?></td>
                <td><?php print_r($_SESSION['total'].'$')?></td>
            </tr>

            <tr>
                <td colspan='7'>
                    <form action="cliente/venta.php" method='post'>
                        <input type="submit" class='button' value='Comprar'>
                    </form>
                </td>
            </tr>
        
        </table><br><br>



        <?php
    }
    
    ?>

    </div>

</body>
</html>