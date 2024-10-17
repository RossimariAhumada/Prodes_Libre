<?php

//require_once CONTROL_PATH . 'Session.php'; // Posible inclusión de la clase Session para manejo de sesiones (comentado)

// Clase que gestiona la carga de páginas según el módulo y la página especificada
class EnlacesModel
{
    // Método estático para determinar la ruta de la página a cargar según el módulo y la página proporcionados
    public static function enlacesPaginasModelo($modulo, $pagina)
    {
        $cargar = VISTA_PATH; // Define la ruta base de las vistas
        $ruta = ''; // Inicializa la variable que contendrá la ruta para mostrar al usuario

        if ($modulo != '') { // Verifica si se ha proporcionado un módulo
            $cargar .= 'modulo' . DS . $modulo; // Construye la ruta al módulo especificado
            if ($modulo != 'inicio') { // Si el módulo no es 'inicio', agrega un enlace a 'inicio'
                $ruta .= '<a href="' . BASE_URL . 'inicio">inicio</a><p>' . $modulo;
            } else {
                $ruta .= '<p>' . $modulo; // Si el módulo es 'inicio', solo muestra el nombre del módulo
            }
        }

        if ($pagina != '') { // Verifica si se ha proporcionado una página
            $cargar .= DS . $pagina; // Completa la ruta con el nombre de la página
            $ruta .= '</p><p>' . $pagina; // Agrega la página a la ruta que se mostrará al usuario
        }

        $cargar .= '.php'; // Completa la ruta con la extensión del archivo PHP
        $ruta .= '</p>'; // Cierra el tag `<p>` en la ruta

        $ruta = str_replace('_', ' ', $ruta); // Reemplaza guiones bajos por espacios en la ruta para una mejor visualización

        // Verifica si la ruta construida no es legible (archivo no encontrado)
        if (!is_readable($cargar)) {
            $cargar = VISTA_PATH . 'modulo' . DS . 'ingreso_inicio.php'; // Si el archivo no existe, redirige a 'inicio.php'
            $ruta = '<p>ingreso_inicio</p>'; // Establece la ruta como 'inicio'
            header('Location:' . BASE_URL . 'ingreso_inicio'); // Redirige al usuario a la página de inicio
        }

        // Devuelve un array con la página a cargar y la ruta que se mostrará al usuario
        $enlace = array('pagina' => $cargar, 'ruta' => $ruta);
        return $enlace;
    }
}
?>