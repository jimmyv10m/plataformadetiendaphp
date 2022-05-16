
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="estilos/bootstrap.css">
    <link rel="stylesheet" href="estilos/styles.css">
</head>
<body>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 color-fondo">
                    <br />
                    <img src="imagenlocal/logo.png" class="imagen-logo" alt="">
                </div>
                <div class="col-sm-6 color-fondo">
                    <br />
                    <br />
                    <br />
                    <!--Buscador -->
                    <form action="mostrarLibrosBuscados.php" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control border border-success"
                                    placeholder="Buscar Libros" aria-label="Recipient's username"
                                    aria-describedby="button-addon2" name="buscarNombre">
                            
                                <input class="btn btn-success" type="submit" value="Buscar">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3 color-fondo ">
                    <br />
                    <br />
                    <br />
                    <a class="btn btn-outline-success" href="login.php">Iniciar Sesion</a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light personalizar-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">LIBRERIA</a>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Idex
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="portafolio.php">Portafolio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="#">Ayuda</a>
                        </li>
                        <li class="nav-item sm">
                            <a class="nav-link active" href="cerrar.php">Cerrar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="jimmy">
            <ul class="#">
                <li class="#">
                    <a class="#" href="#">Link 1</a>
                </li>
            </ul>
        </nav>
        <br /><br />