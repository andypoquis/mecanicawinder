import { notificacionSwal } from "./utils/notificacionSwal.js";

const titulo = document.title;

const manejarInicioSesion = () => {
  let inputUsuario = String(usuario.value).trim();
  let inputPassword = String(password.value).trim();

  if (inputUsuario.length > 0 && inputPassword.length > 0) {
    identificarUsuario(inputUsuario, inputPassword);
  } else if (inputUsuario.length === 0) {
    notificacionSwal(titulo, "Debes ingresar tu usuario.", "info", "Ok");
  } else {
    notificacionSwal(titulo, "Debes ingresar tu password.", "info", "Ok");
  }
};

const limpiarCampos = () => {
  frmInicioSesion.reset();
};

const identificarUsuario = async (usuario, password) => {
  try {
    const res = await fetch("../src/Controladores/ControladorUsuario", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        accion: "identificarUsuario",
        usuario: {
          usuario: usuario,
          password: password,
        },
      }),
    });
    const data = await res.json();
    if (data.mensaje === "EXITO") {
      limpiarCampos();
      location.href = "./admi";
    } else if (data.mensaje === "LOGIN") {
      notificacionSwal(titulo, "Credenciales no válidas.", "info", "Ok");
      location.href = "./login";
    } else {
      notificacionSwal(titulo, "Ocurrió un error inesperado...", "error", "Ok");
    }
  } catch (ex) {
    notificacionSwal(titulo, "Ocurrió un error inesperado...", "error", "Ok");
  }
};

window.addEventListener("DOMContentLoaded", () => {
  sessionStorage.removeItem("carrito");

  frmInicioSesion.addEventListener("submit", function (e) {
    e.preventDefault(); // Previene el comportamiento por defecto.
    manejarInicioSesion();
  });
});
