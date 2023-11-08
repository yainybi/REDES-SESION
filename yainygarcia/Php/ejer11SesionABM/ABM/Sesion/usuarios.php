<?php
include("sesion.php");
class Usuarios extends Sesion {

    public function __construct() {
        parent::__construct();
        $this->sesion = null;
    }

/**
 * INICIAR SESION
 */
    public function login($nombre, $clave) {
        //$nombre = "yainybi";
        //$clave = 1234;

        $query = "SELECT * from usuarios where nombre= :nombre and clave= :clave and estado = 1 ;";
        $oUsuario = null;

        if ($this->conexionPDO()) {
            $pQuery = $this->conexion->prepare($query);
            $pQuery->bindParam(':nombre', $nombre);
            $pQuery->bindParam(':clave', $clave);
            $pQuery->execute();
            $pQuery->setFetchMode(PDO::FETCH_ASSOC);


            while ($usuario = $pQuery->fetch()) {
                $oUsuario = new Usuario();
                $oUsuario->nombre = $usuario['nombre'];
                $oUsuario->clave = $usuario['clave'];
            }
            
            $this->sesion = $this->getInstancia();
            $this->sesion->iniciarSesion();

            if ($oUsuario != null) {
                $jDatos = json_encode($oUsuario);
                $this->sesion->__set("rolWeb",  $jDatos);
                return 200;
            } else {
                $this->sesion->__set("rolWeb",  null);
                return 401;
            }
        }
    }

}


class Usuario {
    public $nombre = "";
    public $clave = "";
}
?>