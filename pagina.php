<?php

    $destino = "miniaturas/foto.jpg";
    $nAncho = 400;
    $nAlto = 400;
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $imagen_original = $_FILES['imagen']['tmp_name'];
        $img_original = imagecreatefromjpeg($imagen_original);
        $ancho_original = imagesx ($img_original);
        $alto_original = imagesy($img_original);
        $tmp = imagecreatetruecolor ($nAncho, $nAlto);
        imagecopyresized ($tmp, $img_original, 0, 0, 0, 0, $nAncho, $nAlto,$ancho_original, $alto_original);

        imagejpeg($tmp,$destino,100);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="pagina.php" method="post" enctype="multipart/form-data">
        <input type="file" id="imagen "name="imagen" accet="image/jpeg">
        <br/>
        <button type="submit">enviar</button>
    </form>
</body>
</html>