<?php include("cabecera.php");?>
<?php include("conexion.php");?>
<?php 

    if($_POST){
        $objConexion=new conexion();
        $buscarNombre=$_POST['buscarNombre'];
        $datosBuscarNombre=$objConexion->consultar("SELECT * FROM `proyectos` WHERE nombre='$buscarNombre';");
    }
?>
<div class="row row-cols-1 row-cols-md-3 g-4">
<!-- Agrego for a la card-->
<?php foreach ($datosBuscarNombre as $dato) { ?>
  <div class="col">
    <div class="card">
      <img width="200" src="imagenes/<?php echo $dato['imagen'];?>" class="img-fluid" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $dato['nombre'];?></h5>
        <p class="card-text"><?php echo $dato['descripcion'];?></p>
      </div>

    </div>
  </div>
  <?php }?>
</div>

<?php include("pie.php");?>