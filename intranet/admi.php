<?php require_once './validarSesion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
  <title>Admistrador</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--  imagen de bostra css-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--  imagen de bostra js-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <!--  imagen de iconos -->
  <link href="../src/assets/css/admi.css" rel="shortcut icon" />
  <!--  css personalizado-->
  <link rel="stylesheet" href="../src/assets/css/admi.css">
  <!-- Sweetalert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

  <input type="checkbox" id="sidebar-toggle">
  <div class="sidebar">
    <div class="sidebar-header">
      <h3 class="brand">
        <span><i class="fas fa-shipping-fast"></i></span>
        <span>Tienda </span>
      </h3>
      <label for="sidebar-toggle" class="ti-menu-altg"><i class="fa-solid fa-bars"></i></label>

    </div>

    <div class="sidebar-menu">
      <ul class="tabs">
        <li>
          <a href="#">
            <span><i class="fas fa-user-tie"></i></span>
            <span>usuarios</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span><i class="fas fa-store-alt"></i></span>
            <span>Productos</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span><i class="fas fa-shopping-bag"></i></span>
            <span>Categorias</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span><i class="fas fa-portrait"></i></span>
            <span>Portada</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span><i class="fas fa-cart-arrow-down"></i></span>
            <span>Pedidos</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span><i class="fas fa-book-medical"></i></span>
            <span>Historial</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span><i class="fas fa-book-medical"></i></span>
            <span>Favoritos</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-content">
    <main class="main">
      <a href="#" class="boton boton-verde">registrar</a>
      <section id="tab3">
        <header>
          <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" placeholder="Buscar">
          </div>

          <div class="social-icons">
            <a href="cerrarSesion">
              <i class="fas fa-sign-out-alt"></i>
              Cerrar sesion</a>
          </div>
        </header>
        <div class="activity-card ab">
          <h3>Categorias</h3>
          <div class="table-responsive">
            <table>
              <thead>
                <tr>
                  <th>id</th>
                  <th>Categorias</th>
                  <th>Descripcion</th>
                  <th colspan="2">Operaciones</th>
                </tr>
              </thead>

              <tbody>
                <td>
                  1

                </td>
                <td>
                  Categorias1

                </td>
                <td>
                  Descripcion1

                </td>
                <td><a href="#" class="td-team img-1"></td>
                <td><a href="#" class="td-team img-3"></td>
              </tbody>
              <tbody>
                <td>
                  2

                </td>
                <td>
                  Categorias2

                </td>
                <td>
                  Descripcion2
                </td>
                <td><a href="#" class="td-team img-1"></td>
                <td><a href="#" class="td-team img-3"></td>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </main>

  </div>