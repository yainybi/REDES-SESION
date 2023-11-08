<?php
include("DB.php");
class Sesion extends DB {

    const SESION_INICIADA = TRUE;
    const SESION_NO_INICIADA = FALSE;

    private $estadoSesion = self::SESION_NO_INICIADA;

    private static $instancia;

    public function __construct() {
        parent::__construct();
    }


    /**
     * RETORNA LA INSTANCIA DE LA SESION
     * SI NO EXISTE LA INICIALIZA
     */
    public static function getInstancia() {
        if(!isset(self::$instancia)) {
            self::$instancia = new self;
        }
        
        self::$instancia->iniciarSesion();
        return self::$instancia;
        //return new self;
    }

    /**
     * Inia o retoma la sesion
     * return TRUE -> se la sesion se inicia
     * return FALSE -> si no
     */
    public function iniciarSesion() {
        if($this->estadoSesion == self::SESION_NO_INICIADA) {
            $this->estadoSesion = session_start();
        }
        //return self::$instancia;
        return $this->estadoSesion;
    }

    /**
     * Destruir session y variables sesion
     */
    public function cerrarSesion() {
        if($this->estadoSesion == self::SESION_INICIADA) {
            $this->estadoSesion = !session_destroy();
            unset($_SESSION);
            return !$this->estadoSesion;
        }
        return false;
    }

    /**
     * Almacenar Datos Sesion
     */
    public function __set($name, $value) {
        $_SESSION[$name] = $value;
    }

    /**
     * Devolver Datos Sesion
     */
    public function __get($name) {
        if(isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    /**
     * Validar una variable de sesion
     */
    public function __isset($name) {
        return isset($_SESSION[$name]);
    }
}

?>