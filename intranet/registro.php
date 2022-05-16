<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
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
</head>

<body>
  <main>
    <section>

      <div class="contentBx">


        <div class="formBx">

          <h2>Registro</h2>
          <form action="">
            <div class="inputBx">
              <span>Usuario</span>
              <input type="text">
            </div>
            <div class="inputBx">
              <span>Password</span>
              <input type="password">
            </div>
            <div class="inputBx">
              <span>Dni</span>
              <input type="number">
            </div>
            <div class="inputBx">
              <span>Celular</span>
              <input type="number">
            </div>
            <div class="inputBx">
              <input type="submit" value="Registrate">
            </div>
            <div class="inputBx">
              <p>Quieres regresar a login? <a href="login">login</a></p>
            </div>
          </form>

        </div>
      </div>
      <div class="imgBx">
        <img src="../src/assets/img/registro.jpg" alt="login fondo">
      </div>
    </section>
  </main>
  <!-- Sweetalert2 -->
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <!-- JS personalizado -->
  <script src="./src/assets/js/inicioSesion.js" type="module"></script>
</body>

</html>