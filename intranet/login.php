<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesi&oacute;n</title>
    <!-- Iconos -->
    <link href="../src/assets/img/logo.png" rel="shortcut icon" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- CSS personalizado -->
    <link href="../src/assets/css/inicioSesion.css" rel="stylesheet" />
</head>

<body class="text-center">
    <main class="form-signin">
        <form id="frmInicioSesion">
            <img class="mb-4" src="../src/assets/img/logo.png" alt="Logo" width="80" height="80">
            <h1 class="h3 mb-3 fw-normal">Por favor inicie sesi&oacute;n</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="usuario" placeholder="Usuario" />
                <label for="usuario">Usuario</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" placeholder="Password" />
                <label for="password">Password</label>
            </div>
            <button type="submit" class="w-100 btn btn-lg btn-primary">Iniciar Sesi&oacute;n</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
        </form>
    </main>
    <!-- Sweetalert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JS personalizado -->
    <script src="./src/assets/js/inicioSesion.js" type="module"></script>
</body>

</html>