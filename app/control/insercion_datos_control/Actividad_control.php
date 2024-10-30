<?php
require_once MODELO_PATH . 'insercion_datos_model' . DS . 'actividad_model.php';

class guardar_actividad_control {
    private static $instancia;

    // Patrón Singleton
    public static function singleton_actividad_control() {
        if (!isset(self::$instancia)) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    // Método para registrar una nueva actividad
    public function guardar_actividad() {
        // Verificar si el método de la solicitud es POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar las entradas del formulario
            $nombreActividad = $_POST['actividad-name'] ?? '';
            $descripcionActividad = $_POST['actividad-description'] ?? '';
            $detalleActividad = $_POST['actividad-description_detalle'] ?? '';
            $fechaInicio = $_POST['fechaInicio'] ?? '';
            $fechaFinal = $_POST['fechaFin'] ?? '';
            $participantes = $_POST['participante-value'] ?? '';
            $id_ods = $_POST['ods_selection'] ?? '';
            
            // Validar si el archivo de imagen ha sido seleccionado
            if (empty($nombreActividad) || empty($descripcionActividad) || empty($detalleActividad) || empty($fechaInicio) || empty($fechaFinal) || empty($participantes) || empty($id_ods) || !isset($_FILES['actividad-image'])) {
                echo $this->mensajePopup('Error', 'Faltan datos o los campos son inválidos.', 'error.png');
                return;
            }

            // Validar y manejar la imagen adjunta
            $nom_imagen = $_FILES['actividad-image']['name'];
            if ($_FILES['actividad-image']['error'] !== UPLOAD_ERR_OK) {
                echo $this->mensajePopup('Error', 'Hubo un problema con la subida de la imagen.', 'error.png');
                return;
            }

            $ext_imagen = pathinfo($nom_imagen, PATHINFO_EXTENSION);
            $nombre_imagen_subir = strtolower(trim($nombreActividad)) . '.' . $ext_imagen;

            // Verificar si el archivo es una imagen válida (JPG, JPEG, PNG)
            $validExtensions = ['jpg', 'jpeg', 'png'];
            if (!in_array(strtolower($ext_imagen), $validExtensions)) {
                echo $this->mensajePopup('Error', 'Solo se permiten archivos JPG, JPEG, y PNG.', 'error.png');
                return;
            }

            // Arreglo con los valores para guardar en la base de datos
            $valores = array(
                'nombre_actividad' => $nombreActividad,
                'descripcion_actividad' => $descripcionActividad,
                'detalle_actividad' => $detalleActividad,
                'fecha_inicio' => $fechaInicio,
                'fecha_final' => $fechaFinal,
                'participantes' => $participantes,
                'id_ods' => $id_ods,
                'imagen_actividad' => $nombre_imagen_subir
            );

            // Guardar la actividad en la base de datos
            $guardar = actividad_model::guardar_actividad_model($valores);

            // Evaluar si la inserción fue exitosa
            if ($guardar['rsl'] === TRUE) {
                $carp_destino = VISTA_PATH . 'documentos' . DS . 'actividad' . DS;
                $ruta_imagen = $carp_destino . $nombre_imagen_subir;

                // Mover la imagen a la carpeta de destino
                if (move_uploaded_file($_FILES['actividad-image']['tmp_name'], $ruta_imagen)) {
                    // Mensaje de éxito
                    echo $this->mensajePopup('Guardado', 'Actividad registrada exitosamente', 'bien.png');
                } else {
                    // Mensaje de error al mover el archivo
                    echo $this->mensajePopup('Error', 'La actividad se guardó, pero hubo un problema al subir la imagen.', 'error.png');
                }
            } else {
                // Mensaje de error al guardar la actividad en la base de datos
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
                            <a href="" class="opcion" id="btaceptar">Aceptar</a>
                        </div>
                    </div>
                </div>';
    }
}
?>
