<?php include("cabecera.php");?>
<?php include("conexion.php");?>
<?php
session_start();#Para permitir navegar con logueo
#print_r($_SESSION);
if (isset($_SESSION['usuario'])!="jimmy") {#isset: verifica si hay algo en session
  #redireccionamos
  header("location:login.php");
}
?>

<?php
    if($_POST){

        $nombre=$_POST['nombre'];
        $descripcion= $_POST['descripcion'];

        #para agregar el tiempo y concatenar con el nombre de la imagen
        $fecha=new DateTime();
        #obtengo el nombre del archivo foto y concanteno con la fecha
        $imagen=$fecha->getTimestamp()."_".$_FILES['imagen']['name'];
        #recibir el archivo(imagen) desde el formulario
        #$imgen_temporal=$_FILES['archivo']['tmp_name'];
        #mover la imagen a mi carpeta
        #move_uploaded_file($imgen_temporal,"imagenes/".$imagen);

        #REDIMENCIONAR UNA IMAGEN
        $destino = "imagenes/".$imagen;
        $nAncho = 400;
        $nAlto = 400;
        if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $imagen_original = $_FILES['imagen']['tmp_name'];#obtener el archivo del formulario
            $img_original = imagecreatefromjpeg($imagen_original);#obtener las dimenciones de la imagen original
            $ancho_original = imagesx ($img_original);#obtener el ancho
            $alto_original = imagesy($img_original);#obtener el largo
            $tmp = imagecreatetruecolor ($nAncho, $nAlto);#crea una imagen en blanco

            #funcion para redimencionar
            imagecopyresized ($tmp, $img_original, 0, 0, 0, 0, $nAncho, $nAlto,$ancho_original, $alto_original);

            #guardar la imagen con maxima calidad 100
            imagejpeg($tmp,$destino,100);
        }

        #GUARDO EN LA BASE DE DATOS
        $objConexion=new conexion();
        $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
        $objConexion->ejecutar($sql);
        #redirecciono evitando que se haga una copia al momento de actualizar
        header("location:portafolio.php");
    }

    if($_GET){

        $id=$_GET['borrar'];
        $objConexion=new conexion();

        #buscamos la imagen para borrarlo
        $imagen=$objConexion->consultar("SELECT imagen FROM `proyectos` WHERE id=".$id);
        #borramos la imagen de la carpeta
        print_r($imagen);
        unlink("imagenes/".$imagen[0]['imagen']);

        $sql="DELETE FROM `proyectos` WHERE `proyectos`.`id` =".$id;
        $objConexion->ejecutar($sql);

          #redirecciono evitando que se haga una copia al momento de actualizar
          header("location:portafolio.php");
    }

    $objConexion=new conexion();
    $datos=$objConexion->consultar("SELECT * FROM `proyectos`");

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Formulario-->
            <div class="card">
                <div class="card-header">
                    <h3>Datos del proyecto </h3>
                </div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        Nombre del proyecto:
                        <input required class="form-control" type="text" name="nombre">
                        <br />
                        Imagen del proyecto:
                        <input required class="form-control" type="file" name="imagen">
                        <br />
                        Descripcion
                        <textarea required class="form-control" name="descripcion" id="" rows="3"></textarea>
                        <br />
                        <input class="btn btn-success" type="submit" value="Enviar proyecto">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Tabla-->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>IMAGEN</th>
                        <th>DESCRIPCION</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($datos as $dato) { ?>
                    <tr>
                        <td><?php echo $dato['id'];?></td>
                        <td><?php echo $dato['nombre'];?></td>
                        <!--Mostramos la imagen-->
                        <td>
                            <img width="100" src="imagenes/<?php echo $dato['imagen'];?>" alt="" srcset="">
                        </td>
                        <td><?php echo $dato['descripcion'];?></td>
                        <td><a class="btn btn-danger" href="?borrar= <?php echo$dato['id']; ?>">Eliminar</a></td>
                    </tr>
                    <?php }?>

                </tbody>
            </table>

        </div>
    </div>
</div>
<?php include("pie.php");?>
