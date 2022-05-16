<?php
session_start();#Para permitir navegar con logueo

    if ($_POST) {
        if (($_POST['usuario']=="jimmy") && ($_POST['contrasenia']=="123")){
            
            $_SESSION['usuario']="jimmy";#creo variable de session, recupero datos
            header("location:index.php");//redirecciona 
        }
        else{
            echo "<script> alert('credenciales incorrectas');</script>";
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="estilos/materialize.css">
    <link rel="stylesheet" href="estilos/styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body class="">
    <br />
    <br />
    <br />
    <br />
    <div class="container">
        <div class="col s12 m7">
            <div class="card horizontal z-depth-5 bordesdecard">
                <div class="card-image teal lighten-1">
                    <img src="imagenlocal/Ecommerce_Carrito.png">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <!--Contenido de la card-->
                        <div class="row">
                            <form action="login.php" method="post" class="col s12">
                                <div class="row">
                                    <h4 class="header center-align">Iniciar Sesion</h4>
                                    <div class="input-field col s8">
                                        Correo Electronico
                                        <input id="icon_prefix" type="text" class="validate" name="usuario">
                                        Contraseña
                                        <input id="icon_telephone" type="tel" class="validate" name="contrasenia">
                                        <br />
                                        <br />
                                        <button type="submit" class="btn waves-effect waves-light">Iniciar
                                            Sesion</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-action">
                            ¿Aun sin cuenta?
                            <a class="" href="">Registrarse</a>
                        </div>
                        <div class="center-align">
                            <i class="small material-icons prefix">facebook</i>
                            <i class="small material-icons prefix">whatsapp</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>