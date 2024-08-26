<?php
class EnlacesClass {
    private static $instancia;
    private $_modulo;
    private $_page;
    private $_variable;
    private $session;

    public static function singleton_enlaces() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function plantilla() {
        include VISTA_PATH . 'template.php';
    }
    public function enlacesPaginasControl() {
        if (isset($_GET['url'])) {
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $url = array_filter($url);
            $this->_modulo = strtolower(array_shift($url));
            $this->_page = strtolower(array_shift($url));
            $this->_variable = strtolower(array_shift($url));
            if (!$this->_modulo) {
                $this->_modulo = DEFAULT_MODULO;
            }
            if (!$this->_page) {
                $this->_page = DEFAULT_PAGE;
            }
            if (!$this->_variable) {
                $this->_variable = NULL;
            }
        } else {
            $this->_modulo = DEFAULT_MODULO;
            $this->_page = DEFAULT_PAGE;
            $this->_variable = NULL;
        }
        $respuesta = EnlacesModel::enlacesPaginasModelo($this->_modulo, $this->_page);
        $argumento = $this->_variable;
        include_once $respuesta['pagina'];
    }
}