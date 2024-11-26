<?php
require_once MODELO_PATH . 'insercion_datos_model' . DS . 'CompraModel.php';

class GuardarCompraControl {
    private static $instancia;

    // Patrón Singleton
    public static function singleton_compra_control() {
        if (!isset(self::$instancia)) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    // Método para registrar una nueva compra
    public function guardar_compra() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_usuario = $_POST['id_usuario'] ?? '';
            $id_producto = $_POST['id_producto'] ?? '';
            $id_ods = $_POST['id_ods'] ?? '';
            $valor = $_POST['valor'] ?? '';
    
            // Validar campos
            if (empty($id_usuario) || empty($id_producto) || empty($id_ods) || empty($valor)) {
                echo $this->mensajePopup('Error', 'Faltan datos o los campos son inválidos.', 'error.png');
                return;
            }
    
            // Sanitizar el valor eliminando separadores de miles (comas), pero manteniendo el punto decimal
            $valor = str_replace(',', '', $valor);
            // Aquí ya no eliminamos el punto decimal, para que el valor sea correcto, por ejemplo: 250000.00
    
            // Preparar valores para la BD
            $valores = array(
                'id_usuario' => $id_usuario,
                'id_producto' => $id_producto,
                'id_ods' => $id_ods,
                'valor' => $valor,
            );
    
            // Guardar en la base de datos
            $guardar = CompraModel::guardar_compra_model($valores);
    
            if ($guardar['rsl'] === true) {
                echo $this->mensajePopup('Guardado', 'Compra registrada exitosamente.', 'bien.png');
            } else {
                echo $this->mensajePopup('Error', $guardar['mensaje'], 'error.png');
            }
        }
    }
    

    // Método para mostrar un mensaje en un popup
    private function mensajePopup($titulo, $mensaje, $img) {
        return '<div id="solapar"></div>
                <div id="popupmensaje">
                    <a href="" id="btcerrar">Cerrar/Close</a>
                    <div class="popupbarratitlo"><h2>' . $titulo . '</h2></div>
                    <div class="cuerpopopup">
                        <img src="' . PUBLIC_PATH . 'img/' . $img . '" />
                        <p>' . $mensaje . '</p>
                        <div id="centaropcion">
                            <a href="producto_login_inicio" class="opcion" id="btaceptar">Aceptar</a>
                        </div>
                    </div>
                </div>';
    }
}
?>
