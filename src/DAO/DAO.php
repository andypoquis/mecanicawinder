<?php

require_once 'config.php';

class DAO {

    private $cadenaConexion;
    private $conexion;

    public function __construct() {
        try {
            $this->cadenaConexion = "mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE . ";charset=" . DB_CHARSET;
            $this->conexion = new PDO($this->cadenaConexion, DB_USER, DB_PASSWORD);
            $this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    // Función que ejecuta una consulta y retorna los resultados.
    public function ejecutarConsulta($sql = "", $valores = array()) {
        if ($sql !== "" && strlen($sql) > 0) {
            try {
                $consulta = $this->conexion->prepare($sql);
                $consulta->execute($valores);
                if (intval($consulta->errorCode()) === 0) {
                    return $consulta->fetchAll(PDO::FETCH_BOTH);
                } else {
                    return intval($consulta->errorCode());
                }
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        } else {
            return 0;
        }
    }

    // Función que ejecuta una orden y retorna el resultado (0 / 1).
    public function ejecutarOrden($sql = "", $valores = array()) {
        if ($sql !== "" && strlen($sql) > 0) {
            try {
                $this->conexion->beginTransaction();
                $sentencia = $this->conexion->prepare($sql);
                $sentencia->execute($valores);
                if (intval($sentencia->errorCode()) === 0) {
                    $filasAfectadas = $sentencia->rowCount();
                    if ($filasAfectadas >= 0) {
                        $this->conexion->commit(); // Confirmación de las acciones.
                        return 1;
                    } else {
                        $this->conexion->rollBack();
                        return -1;
                    }
                } else {
                    $this->conexion->rollBack();
                    return intval($sentencia->errorCode());
                }
            } catch (Exception $ex) {
                $this->conexion->rollBack();
                return $ex->getMessage();
            }
        } else {
            return -1;
        }
    }

    // Función que ejecuta una serie de ordenes y retorna el resultado (0 / 1).
    public function ejecutarOrdenes($sql = "", $listaValores = array()) {
        if ($sql !== "" && strlen($sql) > 0) {
            try {
                $this->conexion->beginTransaction();
                $sentencia = $this->conexion->prepare($sql);

                $sentenciasEjecutadas = 0;
                foreach ($listaValores as $valores) {
                    $sentencia->execute($valores);
                    if (intval($sentencia->errorCode()) === 0) {
                        $sentenciasEjecutadas++;
                    } else {
                        $this->conexion->rollBack();
                        return -1;
                    }
                }

                if (sizeof($listaValores) === $sentenciasEjecutadas) {
                    $this->conexion->commit(); // Confirmación de las acciones.
                    return 1;
                } else {
                    $this->conexion->rollBack();
                    return -1;
                }
            } catch (Exception $ex) {
                $this->conexion->rollBack();
                return $ex->getMessage();
            }
        } else {
            return -1;
        }
    }
}
