<?php

function validarSesion() {
    session_start();
    return isset($_SESSION['usuario']);
}

if (!validarSesion()) {
    header("Location: ./intranet/login");
} else {
    $usuario = json_decode($_SESSION['usuario'], true);
}
