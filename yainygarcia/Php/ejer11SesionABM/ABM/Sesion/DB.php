<?php
include("../Config/config.php");

class DB {

    public $conexion = null;

    public function __construct() {
        global  $server, $nameDB, $usuarioDB, $passDB;

        $this-> server = $server;
        $this->nameDB = $nameDB;
        $this->usuarioDB = $usuarioDB;
        $this->passDB = $passDB;
    }

    /**
     * METODO DE CONEXION
     */
    public function conexionPDO() {
        try {
            $this->conexion = 
            new PDO("mysql:host=$this->server;dbname=$this->nameDB;", $this->usuarioDB, $this->passDB); 
            //echo "La conexión fue un exito. " . "\n";
           return true; 
        }catch(PDOException $e) {
            echo "La conexión ha fallado: " . $e->getMessage() . "\n";
            return false;
        }
    }

}