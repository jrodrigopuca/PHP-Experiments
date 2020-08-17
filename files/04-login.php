<?php 
    # TO-DO: continuar
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>POST</title>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container d-flex justify-content-center">
    
    <form method="post">
        <div class="text-center mt-4">
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        </div>
    
        <div class="form-label-group mb-3">
            <label for="username">Nombre de Usuario</label>
            <input class="form-control" type="text" name="username">
        </div>
        <div class="form-label-group mb-3">
            <label for="password">Contraseña</label>
            <input class="form-control" type="password" name="password">
        </div>
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Enviar">
    </form>
    </div>

</body>
</html>
