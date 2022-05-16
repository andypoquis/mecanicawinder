<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../src/assets/css/login.css">
  <!-- Iconos -->
  <link href="../src/assets/img/logo.png" rel="shortcut icon" />
  <!-- Tipo de letras -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,900&display=swap"
    rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <main>
    <section>
      <div class="imgBx">
        <img src="../src/assets/img/fondo.jpg" alt="login fondo">
      </div>

      <div class="contentBx">
        <div class="formBx">
          <h2>Login</h2>
          <form id="frmInicioSesion">
            <div class="inputBx">
              <span>Usuario</span>
              <input id="usuario" >
            </div>
            <div class="inputBx">
              <span>Password</span>
              <input id="password" type="password" >
            </div>
            <div class="inputBx">
              <input id="button-login" type="submit" value="Iniciar Sesi&oacute;n" >
            </div>
            <div class="inputBx">
              <p>Aun no te as registrado? <a href="registro">Registarte</a></p>
            </div>
          </form>
          <h3>Ingresar con:</h3>
          <ul class="sci">
            <li><img src="../src/assets/img/facebook.png" alt="facebook"></li>
            <li><img src="../src/assets/img/twitter.png" alt="twitter"></li>
            <li><img src="../src/assets/img/instagram.png" alt="instagram"></li>
          </ul>
        </div>
      </div>
    </section>
  </main>
  <!-- Sweetalert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
    
  </script>
  <!-- JS personalizado -->
  <script src="../src/assets/js/inicioSesion.js" type="module">
    
    
  </script>
</body>

</html>