<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/nuevostate.js"></script>
    <title>Registro | Limpianeitor</title>
</head>
<body>

    <div class="header"><h1>Registro</h1></div>

    <div class="container text-center">
        <div class="row">
            <div class="col-12 cuadror">

            <form action="ingresar.php" method="post"><br><br>
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
                        <input type="number" name="cedula" id="cedula" class="campo" placeholder="Ingrese su cedula" min=4000000 required/>
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
                        <input type="submit" value="Siguiente" class="button" name="btn">
                    </div><br>

                    <a href="index.php" class="salto">Iniciar sesion</a>

                </form>

            </div>
        </div>
    </div>

</body>
</html>