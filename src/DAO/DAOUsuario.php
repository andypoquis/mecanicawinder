<?php

require_once '../DAO/DAO.php';
require_once '../Entidades/Persona.php';
require_once '../Entidades/RolUsuario.php';
require_once '../Entidades/Usuario.php';

class DAOUsuario {

    // Función que nos permite identificar a un usuario (con usuario y password).
    public function identificarUsuario($pUsuario) {
        $dao = new DAO();
        $sql = "CALL sp_identificarUsuario(:usuario, :password);";
        $valores = array('usuario' => $pUsuario['usuario'], 'password' => $pUsuario['password']);

        try {
            $resultSet = $dao->ejecutarConsulta($sql, $valores);
            if (is_array($resultSet) && (sizeof($resultSet) === 1)) {
                $fila = $resultSet[0];
                $persona = new Persona(intval($fila[2]), $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], true);
                $persona->setNombreCompleto($persona->getApellidoPaterno() . " " . $persona->getApellidoMaterno() . ", " . $persona->getNombres());
                $rolUsuario = new RolUsuario(intval($fila[9]), $fila[10]);
                $usuario = new Usuario(intval($fila[0]), $persona, $rolUsuario, $fila[1]);
            } else {
                $usuario = null;
            }
        } catch (Exception $ex) {
            $usuario = $ex;
        }
        return $usuario;
    }

    // Función que nos permite obtener las coincidencias de un nombre de usuario (para saber si ya existe).
    public function obtenerCoincidenciasNombreUsuario($pUsuario) {
        $dao = new DAO();
        $sql = "CALL sp_obtenerCoincidenciasNombreUsuario(:usuario);";
        $valores = array('usuario' => $pUsuario);

        try {
            $resultSet = $dao->ejecutarConsulta($sql, $valores);
            if (is_array($resultSet) && (sizeof($resultSet) === 1)) {
                $fila = $resultSet[0];
                $coincidencias = intval($fila[0]);
            } else {
                $coincidencias = null;
            }
        } catch (Exception $ex) {
            $coincidencias = $ex;
        }
        return $coincidencias;
    }
}
