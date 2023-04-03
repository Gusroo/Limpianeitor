<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/nuevostate.js"></script>
    <title>Iniciar sesion | Limpianeitor</title>
</head>
<body>
    
    <header><h1>¡Donde limpiamos hasta tus penas!</h1></header>

    <div class="container text-center">
        <div class="row">
            <div class="col-12 cuadro">

            <form action="validar.php" method="post">

                    <h2>Login</h2><br>
                    <div class="elementos">
                        <input type="text" name="correo" id="correo" class="campo" placeholder="Ingrese su correo" required/>
                    </div>
                    <div class="elementos">
                        <input type="password" name="clave" id="clave" class="campo" placeholder="Ingrese su contraseña" min="8" max="10" required/>
                    </div>

                    <div class="elementos">
                        <input type="submit" value="Siguiente" class="button">
                    </div><br>

                    <a href="registro.php" class="salto">Nuevo usuario</a>

                </form>
            </div>
        </div>
    </div>

</body>
</html>