import { notificacionSwal } from "./utils/notificacionSwal.js";

const titulo = document.title;

let isPassword = false;
let isUser = false;

$("#button-login").prop("disabled", true);

$("#usuario").keyup(function () {
  isUser = $(this).val().length != 0 ? true : false;

  if (isPassword && isUser) {
    document.getElementById("button-login").style.backgroundColor = "#3a0ca3";
    $("#button-login").prop("disabled", false);
  } else {
    document.getElementById("button-login").style.backgroundColor = "grey";
    $("#button-login").prop("disabled", true);
  }
});

$("#password").keyup(function () {
  isPassword = $(this).val().length >= 5 ? true : false;
  if (isPassword && isUser) {
    document.getElementById("button-login").style.backgroundColor = "#3a0ca3";
    $("#button-login").prop("disabled", false);
  } else {
    document.getElementById("button-login").style.backgroundColor = "grey";
    $("#button-login").prop("disabled", true);
  }
});

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
    const res = await fetch("http://34.133.92.25/api/auth/local", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        identifier: usuario,
        password: password,
      }),
    });

    console.log(res.status);
    const data = await res.json().then((data) => {
      console.log(data.jwt);
      sessionStorage.setItem("token", data.jwt);
      sessionStorage.setItem("id", data.user.id);
    });

    if (res.status == 200) {
      limpiarCampos();

      sessionStorage.setItem("key", true);
      window.location.href = "../intranet/admi";
    } else if (res.status == 400) {
      notificacionSwal(titulo, "Credenciales no válidas.", "info", "Ok");
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
