<?php
class EnlacesClass {
    private static $instancia; // Variable estática para almacenar la instancia única de la clase
    private $_modulo; // Variable para almacenar el módulo de la URL
    private $_page; // Variable para almacenar la página de la URL
    private $_variable; // Variable para almacenar la variable opcional de la URL
    private $session; // Variable para manejar la sesión (aunque no se utiliza en este fragmento)

    // Método estático para obtener la única instancia de la clase (patrón Singleton)
    public static function singleton_enlaces() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__; // Obtiene el nombre de la clase actual
            self::$instancia = new $miclase; // Crea una nueva instancia de la clase si no existe ya una
        }
        return self::$instancia; // Devuelve la instancia única de la clase
    }

    // Método para cargar la plantilla de la página
    public function plantilla() {
        include VISTA_PATH . 'template.php'; // Incluye el archivo de plantilla definido en VISTA_PATH
    }

    // Método para manejar los enlaces de las páginas
    public function enlacesPaginasControl() {
        if (isset($_GET['url'])) { // Verifica si hay un parámetro 'url' en la URL
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL); // Filtra y limpia el parámetro 'url'
            $url = explode('/', $url); // Divide la URL en partes por '/'
            $url = array_filter($url); // Elimina elementos vacíos del array resultante
            $this->_modulo = strtolower(array_shift($url)); // Asigna el primer elemento como módulo y lo convierte a minúsculas
            $this->_page = strtolower(array_shift($url)); // Asigna el segundo elemento como página y lo convierte a minúsculas
            $this->_variable = strtolower(array_shift($url)); // Asigna el tercer elemento como variable y lo convierte a minúsculas
            if (!$this->_modulo) { // Si no hay módulo especificado, usa el módulo por defecto
                $this->_modulo = DEFAULT_MODULO;
            }
            if (!$this->_page) { // Si no hay página especificada, usa la página por defecto
                $this->_page = DEFAULT_PAGE;
            }
            if (!$this->_variable) { // Si no hay variable especificada, la establece como NULL
                $this->_variable = NULL;
            }
        } else { // Si no hay parámetro 'url' en la URL, usa valores por defecto
            $this->_modulo = DEFAULT_MODULO;
            $this->_page = DEFAULT_PAGE;
            $this->_variable = NULL;
        }

        // Llama al modelo para obtener la respuesta según el módulo y la página especificados
        $respuesta = EnlacesModel::enlacesPaginasModelo($this->_modulo, $this->_page);
        $argumento = $this->_variable; // Asigna la variable para ser incluida en la página

        include_once $respuesta['pagina']; // Incluye el archivo de la página obtenido del modelo
    }
}
?>