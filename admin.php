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
$Comando_i = "SELECT * from insumos";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Administrador | Limpianeitor</title>
</head>
<body>

<header><h1>Administrador</h1></header>
<div class="submenu">
    <h4><a href="#Agregarusuario">Agregar usuario</a> | <a href="#Eliminarusuario">Eliminar usuario</a> | <a href="#Agregarproducto">Agregar producto</a> | <a href="#Modificarproducto">Modificar stocks de producto | <a href="#Eliminarproducto">Eliminar producto</a> | <a href="#Agregarinsumo">Agregar insumo</a> | <a href="#Modificarinsumo">Modificar stocks de insumos</a> | <a href="#Eliminarinsumo">Eliminar insumos</a></h4>
</div>

<div class="usuario">

<h1><b>Usuarios</b></h1>

<h2><b id="Agregarusuario">Agregar usuario</b></h2><br><br>

<div class="container text-center">
        <div class="row">
            <div class="col-12 cuadrorr">

            <form action="admin/ingresaru.php" method="post"><br><br>
                    <div class="elementos">
                        <label for="">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" class="campo" placeholder="Ingrese su nombre" required/>
                    </div>

                    <div class="elementos">
                        <label for="">Apellido: </label>
                        <input type="text" name="apellido" id="apellido" class="campo" placeholder="Ingrese su apellido" required/>
                    </div>

                    <div class="elementos">
                        <label for="">Cédula: </label>
                        <input type="number" name="cedula" id="cedula" class="campo" placeholder="Ingrese su cedula (Max. 8 dig)" min=4000000 required/>
                    </div>

                    <div class="elementos">
                        <label for="">Correo: </label>
                        <input type="text" name="correo" id="correo" class="campo" placeholder="Ingrese su correo" required/>
                    </div>

                    <div class="elementos">
                        <label for="">Teléfono: </label>
                        <input type="number" name="telefono" id="telefono" class="campo" placeholder="Ingrese su telefono" required/>
                    </div>

                    <div class="elementos">
                        <label for="">Contraseña: </label>
                        <input type="password" name="clave" id="clave" class="campo" placeholder="Ingrese su contraseña" min="8" max="10" required/>
                    </div>

                    <div class="elementos">
                        <select name="id">
                            <option value="2">Supervisor</option>
                            <option value="3">Usuario Personal</option>
                        </select>
                    </div><br>

                    <div class="elementos">
                        <input type="submit" value="Registrar" class="button" name="btn">
                    </div><br> 

            </form>

        </div>
    </div>
    <br><br><br><h2><b id="Eliminarusuario">Eliminar usuario</b></h2><br><br>
</div>

<a href="#" class="btn-flotante">Ir al principio</a>

<form action="admin/eliminar.php" method="post">
    <table>
        <tr>
            <td class="b-b"><b>Nombre</b></td>
            <td class="b-b"><b>Apellido</b></td>
            <td class="b-b"><b>Cedula</b></td>
            <td class="b-b"><b>Correo</b></td>
            <td class="b-b"><b>Telefono</b></td>
            <td class="b-b"><b>Rol</b></td>
            <td class="b-b"><b>Opcion</b></td>
        </tr>

        <?php
        
        $Resultado = mysqli_query($conexion, $Comando_u);

        while($Datos = mysqli_fetch_array($Resultado)) {
        
        ?>

        <tr>
            <td class="b-b"><?php echo $Datos['nombre']?></td>
            <td class="b-b"><?php echo $Datos['apellido']?></td>
            <td class="b-b"><?php echo $Datos['cedula']?></td>
            <td class="b-b"><?php echo $Datos['correo']?></td>
            <td class="b-b"><?php echo $Datos['telefono']?></td>
            <td class="b-b"><?php echo $Datos['id_rol']?></td>
            <td class="b-b"><button class="buttonE" name="id" value="<?php echo $Datos['id_usuario']?>">Eliminar</button></td>
        </tr>

        <?php
        }
        ?>
        
    </table><br><br>

</form>

<br><br><h2 class="usuario"><b id="Agregarproducto">Agregar productos</b></h2><br><br>

<div class="container text-center">
        <div class="row">
            <div class="col-12 cuadro">

            <form action="admin/ingresarp.php" method="post"><br><br>
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

<br><br><h2 class="usuario"><b id="Modificarproducto">Modificar stocks de productos</b></h2><br><br>

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
                <form action="admin/modificarp.php" method="post">
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

<form action="admin/eliminarp.php" method="post">

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

<br><h2 class="usuario"><b id="Agregarinsumo">Agregar insumos</b></h2><br><br>

<div class="container text-center">
        <div class="row">
            <div class="col-12 cuadroo">

            <form action="admin/ingresari.php" method="post"><br><br>
                    <div class="elementos">
                        <label for="">Nombre del insumo: </label>
                        <input type="text" name="nombrei" id="nombrei" class="campo" placeholder="Ingrese el nombre" required/>
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

<br><br><br><h2 class="usuario"><b id="Modificarinsumo">Modificar stocks de insumos</b></h2><br><br>

    <table class="tablap">
        <tr>
            <td class="b-b"><b>Producto</b></td>
            <td class="b-b"><b>Cantidad</b></td>
            <td class="b-b"><b>Ingrese la nueva stock</b></td>
        </tr>

        <?php
        
        $Resultado = mysqli_query($conexion, $Comando_i);

        while($Datos = mysqli_fetch_array($Resultado)) {
        
        ?>

        <tr>
            <td class="b-b"><?php echo $Datos['nombre']?></td>
            <td class="b-b"><?php echo $Datos['cantidad']?></td>
            <td>
                <form action="admin/modificari.php" method="post">
                <input type="hidden" name="id_stock" value="<?php echo $Datos['id_insumo']?>">
                <input type="number" name="cstock" class="input-p" min=1 required>
                <input type="submit" names="estock" value="Modificar" class="btn-t">
                </form>
            </td>
        </tr>

        <?php
        }
        ?>
        
    </table><br><br>

<br><br><br><h2 class="usuario"><b id="Eliminarinsumo">Eliminar insumos</b></h2><br><br>

<form action="admin/eliminari.php" method="post">

    <table class="tablap">
        <tr>
            <td class="b-b"><b>Producto</b></td>
            <td class="b-b"><b>Cantidad</b></td>
            <td class="b-b"><b>Opcion</b></td>
        </tr>

        <?php
        
        $Resultado = mysqli_query($conexion, $Comando_i);

        while($Datos = mysqli_fetch_array($Resultado)) {
        
        ?>

        <tr>
            <td class="b-b"><?php echo $Datos['nombre']?></td>
            <td class="b-b"><?php echo $Datos['cantidad']?></td>
            <td class="b-b"><button class="buttonE" name="id" value="<?php echo $Datos['id_insumo']?>">Eliminar</button></td>
        </tr>

        <?php
        }
        ?>
        
    </table><br><br>

</form>

</div>

</body>
</html>