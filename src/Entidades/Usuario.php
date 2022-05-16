<?php

class Usuario implements JsonSerializable {

    private $id;
    private $persona;
    private $rolUsuario;
    private $usuario;
    private $password;
    private $vigencia;

    public function __construct($id, $persona, $rolUsuario, $usuario, $password = null, $vigencia = true) {
        $this->id = $id;
        $this->persona = $persona;
        $this->rolUsuario = $rolUsuario;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->vigencia = $vigencia;
    }

    public function getId() {
        return $this->id;
    }

    public function getPersona() {
        return $this->persona;
    }

    public function getRolUsuario() {
        return $this->rolUsuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getVigencia() {
        return $this->vigencia;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setPersona($persona): void {
        $this->persona = $persona;
    }

    public function setRolUsuario($rolUsuario): void {
        $this->rolUsuario = $rolUsuario;
    }

    public function setUsuario($usuario): void {
        $this->usuario = $usuario;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setVigencia($vigencia): void {
        $this->vigencia = $vigencia;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
