<?php require_once './cabecera.php'; ?>
    <div class="sidebar-menu" id="menu">
      <!-- navbar -->
    </div>
  </div>
  <div class="main-content">
    <main class="main">
      <a href="./registro.php" id="registro" class="boton boton-verde">registrar</a>
      <section id="tab3">
        <header>
          <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" placeholder="Buscar">
          </div>
          <img id="image_profile" src="" alt="Perfil" style="width:50">
          <label id="name" for=""></label>
          <label id="role" for=""></label>
          <div class="social-icons">
            <a href="cerrarSesion">
              <i class="fas fa-sign-out-alt"></i>
              Cerrar sesion</a>
          </div>
        </header>
        <div class="activity-card ab">
          <h3>Usuarios</h3>
          <div class="table-responsive">
            <table id="table">
             <!-- data -->
            </table>
          </div>
        </div>
      </section>
    </main>
  </div>
  <script src="../src/Controladores/users_controller.js" type="module"></script>
  </body>

</html>