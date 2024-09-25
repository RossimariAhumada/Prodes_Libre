<?php

// Definición de la clase CnxClass que maneja la conexión a la base de datos
class CnxClass {

    // Variable estática para almacenar la única instancia de la clase (patrón Singleton)
    private static $instancia;

    // Variable que almacenará la conexión a la base de datos
    private $cnx;

    // Propiedades protegidas y privadas para los detalles de conexión
    protected $manejador = 'mysql'; // Tipo de manejador de la base de datos
    private static $hostname = 'localhost'; // Dirección del servidor de base de datos
    private static $username = 'root'; // Nombre de usuario para la base de datos
    private static $passwordserver = ''; // Contraseña del servidor de la base de datos
    protected $database = 'prodes_libre'; // Nombre de la base de datos

    // Constructor privado (patrón Singleton) que establece la conexión a la base de datos
    private function __construct() {
        try {
            // Crea una nueva instancia de PDO para la conexión a la base de datos
            $this->cnx = new PDO($this->manejador . ":host=" . self::$hostname . ";dbname=" . $this->database, self::$username, self::$passwordserver, array(PDO::ATTR_PERSISTENT => true));

            // Configura la conexión para que utilice UTF-8
            $this->cnx->exec("SET CHARACTER SET utf8");

            // Configura PDO para que lance excepciones en caso de errores
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            // Si ocurre un error, se muestra el mensaje de error y se detiene la ejecución
            print "Error de conexión a la base de datos!: " . $e->getMessage();
            die();
        }
    }

    /****************************** */

    // Método público para preparar una consulta SQL
    public function preparar($sql) {
        return $this->cnx->prepare($sql); // Devuelve un objeto PDOStatement preparado
    }

    /******************************** */

    // Método estático que implementa el patrón Singleton para obtener una única instancia de la clase
    public static function singleton_conexion() {
        // Verifica si la instancia no ha sido creada aún
        if (!isset(self::$instancia)) {
            // Si no existe, crea una nueva instancia de la clase
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        // Retorna la instancia única de la clase
        return self::$instancia;
    }

    /****************************** */

    // Método para obtener el ID del último registro insertado en la base de datos
    public function ultimoIngreso($cp = null) {
        return $this->cnx->lastInsertId($cp);
    }

    /****************************** */

    // Método para cerrar la conexión (opcional)
    public function cerrarConexion() {
        $this->cnx = null; // Cierra la conexión a la base de datos
    }

    /****************************** */

    // Método mágico para evitar la clonación del objeto (patrón Singleton)
    public function __clone() {
        // Genera un error si se intenta clonar la instancia
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}
?>