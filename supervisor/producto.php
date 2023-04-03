<?php
$server="localhost";
$db="id20544926_db";
$user="id20544926_dbl";
$pass="A1b2c3d4e5f6=12";

$conexion = mysqli_connect($server, $user, $pass, $db);

if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}
$Comando_u = "SELECT * from usuario WHERE id_rol=2 OR id_rol=3";
$Comando_p = "SELECT * from productos";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Productos - Supervisor | Limpianeitor</title>
</head>
<body>

<header><h1>Supervisor</h1></header>
<div class="submenu">
    <h3><u>Productos</u> | <a href="insumo.php">Insumos</a></h3>
</div>

<div class="usuario">

<h1><b>Productos</b></h1>

<a href="#" class="btn-flotante">Ir al principio</a>

<br><h2 class="usuario"><b id="Agregarproducto">Agregar productos</b></h2><br><br>

<div class="container text-center">
        <div class="row">
            <div class="col-12 cuadro">

            <form action="ingresarp-s.php" method="post"><br><br>
                    <div class="elementos">
                        <label for="">Nombre del producto: </label>
                        <input type="text" name="nombrep" id="nombrep" class="campo" placeholder="Ingrese el nombre" required/>
                    </div>

                    <div class="elementos">
                        <label for="">Precio: </label>
                        <input type="number" name="precio" id="precio" class="campo" placeholder="Ingrese el precio" min=1 required/>
                    </div>

                    <div class="elementos">
                        <label for="">Cantidad: </label>
                        <input type="number" name="cantidad" id="cantidad" class="campo" placeholder="Ingrese la cantidad" min=1 required/>
                    </div><br>

                    <div class="elementos">
                        <input type="submit" value="Registrar" class="button" name="btn">
                    </div><br> 

            </form>

        </div>
    </div>
</div>

<br><br><br><h2 class="usuario"><b id="Eliminarproducto">Modificar stocks de productos</b></h2><br><br>

    <table class="tablap">
        <tr>
            <td class="b-b"><b>Producto</b></td>
            <td class="b-b"><b>Precio</b></td>
            <td class="b-b"><b>Cantidad</b></td>
            <td class="b-b"><b>Ingrese la nueva stock</b></td>
        </tr>

        <?php
        
        $Resultado = mysqli_query($conexion, $Comando_p);

        while($Datos = mysqli_fetch_array($Resultado)) {
        
        ?>

        <tr>
            <td class="b-b"><?php echo $Datos['nombre']?></td>
            <td class="b-b"><?php echo $Datos['precio']?>$</td>
            <td class="b-b"><?php echo $Datos['cantidad']?></td>
            <td>
                <form action="modificar-p-s.php" method="post">
                <input type="hidden" name="id_stock" value="<?php echo $Datos['id_producto']?>">
                <input type="number" name="cstock" class="input-p" min=1 required>
                <input type="submit" names="estock" value="Modificar" class="btn-t">
                </form>
            </td>
        </tr>

        <?php
        }
        ?>
        
    </table><br><br>

<br><br><br><h2 class="usuario"><b id="Eliminarproducto">Eliminar productos</b></h2><br><br>

<form action="eliminarp-s.php" method="post">

    <table class="tablap">
        <tr>
            <td class="b-b"><b>Producto</b></td>
            <td class="b-b"><b>Precio</b></td>
            <td class="b-b"><b>Cantidad</b></td>
            <td class="b-b"><b>Opcion</b></td>
        </tr>

        <?php
        
        $Resultado = mysqli_query($conexion, $Comando_p);

        while($Datos = mysqli_fetch_array($Resultado)) {
        
        ?>

        <tr>
            <td class="b-b"><?php echo $Datos['nombre']?></td>
            <td class="b-b"><?php echo $Datos['precio']?>$</td>
            <td class="b-b"><?php echo $Datos['cantidad']?></td>
            <td class="b-b"><button class="buttonE" name="id" value="<?php echo $Datos['id_producto']?>">Eliminar</button></td>
        </tr>

        <?php
        }
        ?>
        
    </table><br><br>

</form>

</div>

</body>
</html>