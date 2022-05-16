<?php

class Persona implements JsonSerializable {

    private $id;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $nombres;
    private $nombreCompleto; // Auxiliar para el nombre completo de cada persona.
    private $dni;
    private $fechaNacimiento;
    private $sexo;
    private $vigencia;

    public function __construct($id, $apellidoPaterno, $apellidoMaterno, $nombres, $dni, $fechaNacimiento, $sexo, $vigencia) {
        $this->id = $id;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->nombres = $nombres;
        $this->dni = $dni;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->sexo = $sexo;
        $this->vigencia = $vigencia;
    }

    public function getId() {
        return $this->id;
    }

    public function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }

    public function getApellidoMaterno() {
        return $this->apellidoMaterno;
    }

    public function getNombres() {
        return $this->nombres;
    }

    public function getNombreCompleto() {
        return $this->nombreCompleto;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getVigencia() {
        return $this->vigencia;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setApellidoPaterno($apellidoPaterno): void {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    public function setApellidoMaterno($apellidoMaterno): void {
        $this->apellidoMaterno = $apellidoMaterno;
    }

    public function setNombres($nombres): void {
        $this->nombres = $nombres;
    }

    public function setNombreCompleto($nombreCompleto): void {
        $this->nombreCompleto = $nombreCompleto;
    }

    public function setDni($dni): void {
        $this->dni = $dni;
    }

    public function setFechaNacimiento($fechaNacimiento): void {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setSexo($sexo): void {
        $this->sexo = $sexo;
    }

    public function setVigencia($vigencia): void {
        $this->vigencia = $vigencia;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }
}
