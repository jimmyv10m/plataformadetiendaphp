<?php
session_start();#Para permitir navegar con logueo
session_destroy();
header("location:index.php");

?>