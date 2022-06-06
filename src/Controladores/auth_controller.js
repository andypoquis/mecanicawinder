var data = sessionStorage.getItem("key");

const getDataRole = async () => {
  var token = sessionStorage.getItem("token");
  var id = sessionStorage.getItem("id");
  try {
    const res = await fetch(
      "http://34.133.92.25/api/users/" + id + "?populate=*",
      {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          Authorization: "Bearer " + token,
        },
      }
    );

    console.log(res);

    console.log(res.status);
    const data = await res.json().then((data) => {
      document.getElementById("name").innerHTML = data.name;
      document.getElementById("role").innerHTML = data.role.description;
      document.getElementById("image_profile").src =
        "http://34.133.92.25" + data.image_profile.url;

      if (data.role.description == "Técnico") {
        document.getElementById("menu").style.display = "none";
      }
      if (data.role.description == "Administrador") {
        let $domlink = `<ul class="tabs">
        <li>
          <a href="#" id="usuario">
            <span><i class="fas fa-user-tie"></i></span>
            <span>usuarios</span>
          </a>
        </li>
        <li>
          <a href="#" id="productosss">
            <span><i class="fas fa-store-alt"></i></span>
            <span>Productos</span>
          </a>
        </li>
        <li>
          <a href="#" id="servicios">
            <span><i class="fas fa-shopping-bag"></i></span>
            <span>Servicios</span>
          </a>
        </li>
        <li>
          <a href="#" id="portadas">
            <span><i class="fas fa-portrait"></i></span>
            <span>Portada</span>
          </a>
        </li>
        <li>
          <a href="#" id="pedidos">
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
      </ul>`;

        document.getElementById("menu").innerHTML = $domlink;
        document.getElementById("usuario").href = "admi.php";
        document.getElementById("productosss").href = "productos.php";
        document.getElementById("servicios").href = "servicios.php";
        document.getElementById("pedidos").href = "pedidos.php";

      }
    });
    if (res.status == 200) {
    } else {
    }
  } catch (ex) {}
};

if (data == false || data == null) {
  window.location.href = "../intranet/login";
} else {
  getDataRole();
}
