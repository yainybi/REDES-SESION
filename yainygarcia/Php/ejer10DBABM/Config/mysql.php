<?php
include("./config.php");

class MySQL {

    private $conexion = null;

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
           return true; 
        }catch(PDOException $e) {
            echo "La conexión ha fallado: " . $e->getMessage() . "\n";
            return false;
        }
    }


    /**
     * GET LISTA TICKETS
     */

    public function getTickets($parametros) {
        $jsonDatos = '';
        $arrayData = array();
        $i = 0;
        try {
            $this->conexionPDO();  
            
            if ($parametros['filtroCategoria'] != null) {

                $stringQuery = "SELECT * FROM tickets WHERE categoria = :categoria ORDER BY " . $parametros['criterioOrden'];
                // Prepare
                $query = $this->conexion->prepare($stringQuery);
                // Bind
                $query->bindParam(':categoria', $parametros['filtroCategoria']);

            }elseif ($parametros['filtroPorPalabra']  != null){

                $stringQuery = "SELECT * FROM tickets WHERE " . $parametros['campoAFiltrar'] . " LIKE :filtroPorPalabra ORDER BY " . $parametros['criterioOrden'];
                // Prepare
                $filtroPalabra = '%' . $parametros['filtroPorPalabra'] . '%';
                $query = $this->conexion->prepare($stringQuery);
                // Bind
                $query->bindParam(':filtroPorPalabra', $filtroPalabra);

            }else {
                $stringQuery = "SELECT * FROM tickets ORDER BY " . $parametros['criterioOrden'];
            
                // Prepare
               $query = $this->conexion->prepare($stringQuery);

            }
                        
            // Execute
            $query->execute();
        
            $query->setFetchMode(PDO::FETCH_ASSOC);
            while($producto = $query->fetch()) {
                $oTicket = new Ticket();
                $oTicket->id = $producto['id'];
                $oTicket->ticket = $producto['ticket'];
                $oTicket->categoria = $producto['categoria'];
                $oTicket->precio = $producto['precio'];
                $oTicket->fecha = $producto['fecha'];

                $arrayData[$i] = $oTicket;
                $i++;
            }
            $jsonDatos = json_encode($arrayData);

            //$this->conexion = null;
        }catch(PDOException $e) {
            echo "MySQL.getTickets --ERROR--" . $e->getMessage(). "\n";
        }
        return $jsonDatos;
    }

    /**
     * GET CATEGORIAS
     */
     public function getCategorias() {
        $jsonDatos = '';
        $arrayData = array();
        $i = 0;
        try {
            $stringQuery = "SELECT * FROM categoria";

            $this->conexionPDO();   

             // Prepare
            $query = $this->conexion->prepare($stringQuery);

              // Execute
            $query->execute();

            $query->setFetchMode(PDO::FETCH_ASSOC);
            while($categoria = $query->fetch()) {
                $oCategoria = new Categoria();
                $oCategoria->nombre = $categoria['nombre'];

                $arrayData[$i] = $oCategoria;
                $i++;
            }
            $jsonDatos = json_encode($arrayData);
            
            $this->conexion = null;
        }catch(PDOException $e) {
            echo "MySQL.getCategorias --ERROR--" . $e->getMessage(). "\n";
        }
        return $jsonDatos;
    }

     /**
     * GET TICKETS
     */
    public function getTicket($idTicket) {
        try {
            $stringQuery = "SELECT * FROM tickets WHERE id = :id";

            $this->conexionPDO();   

             // Prepare
            $query = $this->conexion->prepare($stringQuery);

              // Bind
              $query->bindParam(':id', $idTicket);

              // Execute
            $query->execute();

            $query->setFetchMode(PDO::FETCH_ASSOC);

            // Obtener el resultado de la consulta
            $producto = $query->fetch();

            $oTicket = new Ticket();
            $oTicket->id = $producto['id'];
            $oTicket->ticket = $producto['ticket'];
            $oTicket->categoria = $producto['categoria'];
            $oTicket->precio = $producto['precio'];
            $oTicket->fecha = $producto['fecha'];

            echo ("getTicket() Consulta: " . json_encode($oTicket) . "\n");
            //$jsonDatos = json_encode($oTicket);

            $this->conexion = null;
        }catch(PDOException $e) {
            echo "MySQL.getTicket --ERROR--" . $e->getMessage(). "\n";
        }
        //return $jsonDatos;
    }

        /**
     * MODIFICAR TICKET
     */
    public function updateTicket($parametros) {

        $stringQuery = "UPDATE tickets SET categoria = :categoria, precio = :precio, ticket = :ticket, fecha = :fecha  WHERE id = :id";  
        try {
            $this->conexionPDO();   
            
            // Prepare
            $query = $this->conexion->prepare($stringQuery);

            // Bind
            $id = $parametros['id'];
            $ticket = $parametros['ticket'];
            $categoria = $parametros['categoria'];
            $precio = $parametros['precio'];
            $fecha = $parametros['fecha'];

            $query->bindParam(':id', $id);
            $query->bindParam(':ticket', $ticket);
            $query->bindParam(':categoria', $categoria);
            $query->bindParam(':precio', $precio);
            $query->bindParam(':fecha', $fecha);    
            
            // Execute
            $query->execute();

            echo ("Data modificada: " . $id . ", " . $ticket . ", " . $categoria . ", " . $precio . ", " . $fecha);


            $this->conexion = null;
        }catch(PDOException $e) {
            echo "MySQL.updateTicket --ERROR--" . $e->getMessage(). "\n";
        }
    }

      /**
     * ELIMINAR TICKET
     */
    public function deleteTicket($idEliminar) {
        try {
            $stringQuery = "DELETE FROM  tickets WHERE id = :id"; 

            if ($this->conexionPDO()) {

                // Prepare
                $query = $this->conexion->prepare($stringQuery);

                // Bind
                $query->bindValue(':id', $idEliminar, PDO::PARAM_INT);

                //$query->bindParam(':id', $idEliminar);

                // Execute
                if ($query->execute() == true) {
                    echo ("Registro con id " . $idEliminar . " SI eliminado." . "\n");
                }else {
                    echo ("Registro con id " . $idEliminar . " NO eliminado." . "\n");
                };

                // Confirmar la transacción
                //$this->conexion->commit();

                $this->conexion = null;
                
            }
            //$this->conexionPDO();   
        }catch(PDOException $e) {
            echo "MySQL.deleteTicket --ERROR--" . $e->getMessage(). "\n";
        }
    }

      /**
     * INSERTAR TICKET
     */
    public function insertPDO($ticketData) {
        try {
            $this->stringInsert = "INSERT INTO tickets (ticket, categoria, precio, fecha) 
            VALUES
            (:ticket, :categoria, :precio, :fecha)";

            $this->conexionPDO();   
            
            // Prepare
            $query = $this->conexion->prepare($this->stringInsert);

            // Bind
            $ticket = $ticketData['ticket'];
            $categoria = $ticketData['categoria'];
            $precio = $ticketData['precio'];
            $fecha = $ticketData['fecha'];
            //$icono = $ticketData['icono'];

            // Verificar si se subió un archivo y si no hay errores
            //if (isset($icono['tmp_name']) && $icono['error'] === UPLOAD_ERR_OK) {
            // Validar tipo de archivo
            //    $tipoContenido = mime_content_type($icono['tmp_name']);
            //    if (!in_array($tipoContenido, ['image/png', 'image/jpeg', 'image/gif'])) {
            //        throw new Exception("El archivo debe ser una imagen PNG, JPEG o GIF.");
            //    }

            // Leer el contenido del archivo
               // $iconoBinario = file_get_contents($icono['tmp_name']);
        //} else {
        //    throw new Exception("Se produjo un error al subir el archivo.");
       // }

            $query->bindParam(':ticket', $ticket);
            $query->bindParam(':categoria', $categoria);
            $query->bindParam(':precio', $precio);
            $query->bindParam(':fecha', $fecha);
            //$query->bindParam(':icono', $iconoBinario, PDO::PARAM_LOB); // Usar PDO::PARAM_LOB para datos binarios grandes

             // Execute
             $query->execute();

             echo ("REGISTRO INSERTADO [" . $ticket . ", " . $categoria . ", " . $precio . ", " . $fecha . "]");

             $this->conexion = null;

        }catch(PDOException $e) {
            echo "MySQL.insertPDO --ERROR--" . $e->getMessage(). "\n";
        }
    }
}

class Ticket {
    public $id = 0;
    public $ticket = "";
    public $categoria = "";
    public $precio = 0;
    public $fecha = "";
}

class Categoria {
    public $nombre = "";
}
?>