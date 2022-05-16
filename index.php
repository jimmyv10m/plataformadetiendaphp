<?php include("cabecera.php");?>
<?php include("conexion.php");?>

<?php $objConexion=new conexion();?>
<?php $datos=$objConexion->consultar("SELECT * FROM `proyectos`");?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">LIBROS DE PROGRAMACION</h1>
        <p class="lead">pagina de prueba</p>
        <hr class="my-2">
        <p>Mas info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Revisar</a>
        </p>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3 ">
        <img src="imagenlocal/menuLateral.png" class="img-fluid" alt="">
        </div>
        <div class="col-sm-9">
            <br/>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach ($datos as $dato) { ?>
                <div class="col">
                    <div class="card bordesdecard">
                        <img src="imagenes/<?php echo $dato['imagen'];?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dato['nombre'];?></h5>
                            <p class="card-text"><?php echo $dato['descripcion'];?></p>
                            <a href="#" class="btn btn-primary">Comprar</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>

