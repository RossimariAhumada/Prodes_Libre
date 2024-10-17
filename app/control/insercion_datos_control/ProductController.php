<?php

require_once MODELO_PATH . 'insercion_datos_model' . DS . 'ProductModel.php';

class guardar_producto_control {
    private static $instancia;

    // Patrón Singleton
    public static function singleton_producto_control() {
        if (!isset(self::$instancia)) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    // Método para registrar un nuevo producto
    public function guardar_producto() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' &&
            isset($_POST['product-name']) &&
            !empty($_POST['product-name']) &&
            preg_match('/^[a-zA-Z0-9áéíóúüñÁÉÍÓÚÜÑ ]+$/', $_POST['product-name']) &&
            isset($_POST['product-value']) &&
            !empty($_POST['product-value']) &&
            filter_var($_POST['product-value'], FILTER_VALIDATE_FLOAT) &&
            isset($_POST['product-description']) &&
            !empty($_POST['product-description']) &&
            preg_match('/^[a-zA-Z0-9áéíóúüñÁÉÍÓÚÜÑ ]+$/', $_POST['product-description']) &&
            isset($_POST['ods_selection']) &&
            !empty($_POST['ods_selection']) &&
            isset($_FILES['product-image']) && $_FILES['product-image']['error'] === UPLOAD_ERR_OK
        ) {
            // Obtener el nombre del archivo de la imagen
            $nom_arch = $_FILES['product-image']['name'];
            $ext_img = pathinfo($nom_arch, PATHINFO_EXTENSION);
            $nombre_img_subir = strtolower(trim($_POST['product-name'])) . '.' . $ext_img;

            // Arreglo con los valores para registrar en la base de datos
            $valores = array(
                'nombre_prdcto' => $_POST['product-name'],
                'valor_prdcto' => $_POST['product-value'],
                'descripcion_prdcto' => $_POST['product-description'],
                'foto' => $nombre_img_subir,
                'id_ods' => $_POST['ods_selection']
            );

            // Proceder a guardar mediante el método del modelo
            $guardar = producto_model::guardar_producto_model($valores);

            // Evaluar si tuvo éxito la inserción en la BD
            if ($guardar['rsl'] === TRUE) {
                $carp_destino = VISTA_PATH . 'imgapp' . DS . 'products' . DS;
                $ruta_img = $carp_destino . $nombre_img_subir;

                // Verificar si se subió la imagen y moverla a su destino
                if (move_uploaded_file($_FILES['product-image']['tmp_name'], $ruta_img)) {
                    // Mensaje de éxito
                    echo $this->mensajePopup('Guardado', 'Producto registrado exitosamente', 'bien.png');
                } else {
                    // Mensaje de error al mover la imagen
                    echo $this->mensajePopup('Error', 'El producto se guardó, pero hubo un problema al subir la imagen.', 'error.png');
                }
            } else {
                // Mensaje de error al guardar el producto
                echo $this->mensajePopup('Error', $guardar['mensaje'], 'error.png');
            }
        } else {
            // Mensaje de error o validación fallida
            //echo $this->mensajePopup('ERROR', 'FALTAN DATOS O LOS CAMPOS SON INVÁLIDOS', '');
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
                            <a href="" class="opcion" id="btaceptar">Aceptar</a>
                        </div>
                    </div>
                </div>';
    }
}
?>