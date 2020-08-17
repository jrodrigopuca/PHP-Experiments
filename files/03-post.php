<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>POST</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Haciendo un POST</h1>
    <?php
        if (!empty($_POST)){
            echo "texto enviado: ".$_POST["texto"];
        }
    ?>
    <form method="post">
        <input type="text" name="texto">
        <input type="submit" class="btn btn-primary" value="Enviar">
    </form>
</body>
</html>
