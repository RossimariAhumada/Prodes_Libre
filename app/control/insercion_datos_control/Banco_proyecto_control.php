<?php
require_once MODELO_PATH . 'insercion_datos_model' . DS . 'ProyectoModel.php';

class guardar_proyecto_control {
    private static $instancia;

    // Patrón Singleton
    public static function singleton_proyecto_control() {
        if (!isset(self::$instancia)) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    // Método para registrar un nuevo proyecto
    public function guardar_proyecto() {
        // Verificar si el método de la solicitud es POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar las entradas del formulario
            $nombreProyecto = $_POST['nombreProyecto'] ?? '';
            $presupuesto = $_POST['presupuesto'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $ods = $_POST['ods'] ?? '';
            
            if (empty($nombreProyecto) || empty($presupuesto) || empty($descripcion) || empty($ods) || !isset($_FILES['documento_adjunto'])) {
                echo $this->mensajePopup('Error', 'Faltan datos o los campos son inválidos.', 'error.png');
                return;
            }

            // Validar y manejar el archivo adjunto
            $nom_arch = $_FILES['documento_adjunto']['name'];
            if ($_FILES['documento_adjunto']['error'] !== UPLOAD_ERR_OK) {
                echo $this->mensajePopup('Error', 'Hubo un problema con la subida del archivo.', 'error.png');
                return;
            }

            $ext_arch = pathinfo($nom_arch, PATHINFO_EXTENSION);
            $nombre_arch_subir = strtolower(trim($nombreProyecto)) . '.' . $ext_arch;

            // Verificar si el archivo es un PDF
            if (strtolower($ext_arch) !== 'pdf') {
                echo $this->mensajePopup('Error', 'Solo se permiten archivos PDF.', 'error.png');
                return;
            }

            // Arreglo con los valores para guardar en la base de datos
            $valores = array(
                'nombre_proyecto' => $nombreProyecto,
                'descripcion_proyecto' => $descripcion,
                'documento_adjunto' => $nombre_arch_subir,
                'fecha_inicio' => $_POST['fechaInicio'] ?? '',
                'fecha_final' => $_POST['fechaFin'] ?? '',
                'presupuesto' => $presupuesto,
                'resultados_esperados' => $_POST['indicadores'] ?? '',
                'ubicacion' => $_POST['ubicacion'] ?? '',
                'id_ods' => $ods
            );

            // Guardar el proyecto en la base de datos
            $guardar = proyecto_model::guardar_proyecto_model($valores);

            // Evaluar si la inserción fue exitosa
            if ($guardar['rsl'] === TRUE) {
                $carp_destino = VISTA_PATH . 'documentos' . DS . 'proyecto' . DS;
                $ruta_arch = $carp_destino . $nombre_arch_subir;

                // Mover el archivo PDF a la carpeta de destino
                if (move_uploaded_file($_FILES['documento_adjunto']['tmp_name'], $ruta_arch)) {
                    // Mensaje de éxito
                    echo $this->mensajePopup('Guardado', 'Proyecto registrado exitosamente', 'bien.png');
                } else {
                    // Mensaje de error al mover el archivo
                    echo $this->mensajePopup('Error', 'El proyecto se guardó, pero hubo un problema al subir el documento.', 'error.png');
                }
            } else {
                // Mensaje de error al guardar el proyecto en la base de datos
                echo $this->mensajePopup('Error', $guardar['mensaje'], 'error.png');
            }
        } else {
            // Mensaje de error si el método no es POST
            //echo $this->mensajePopup('Error', 'Método de solicitud no válido.', 'error.png');
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