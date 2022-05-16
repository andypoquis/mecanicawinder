<?php

require_once '../DAO/DAOUsuario.php';

$dataJSON = json_decode(file_get_contents('php://input'), true);
$accion = $dataJSON['accion'];

$resultadoJSON = array();

$daoUsuario = new DAOUsuario();

switch ($accion) {
    case "identificarUsuario":
        try {
            $usuario = $daoUsuario->identificarUsuario($dataJSON['usuario']);
            if (($usuario != null) && (gettype($usuario) === "object") && (get_class($usuario) === "Usuario")) {
                session_start();
                $_SESSION['usuario'] = json_encode($usuario);
                $resultadoJSON['mensaje'] = "EXITO";
            } else {
                $resultadoJSON['mensaje'] = "LOGIN";
            }
        } catch (Exception $ex) {
            $resultadoJSON['mensaje'] = $ex->getMessage();
        }
        break;
    case "leerUsuarioLogeado":
        try {
            session_start();
            if (isset($_SESSION['usuario'])) {
                $usuario = json_decode($_SESSION['usuario'], true);
                $resultadoJSON['usuario'] = $usuario;
                $resultadoJSON['mensaje'] = "EXITO";
            } else {
                $resultadoJSON['mensaje'] = "LOGIN";
            }
        } catch (Exception $ex) {
            $resultadoJSON['mensaje'] = $ex->getMessage();
        }
        break;
    default:
        $resultadoJSON['mensaje'] = "Error 404";
}

print(json_encode($resultadoJSON));
