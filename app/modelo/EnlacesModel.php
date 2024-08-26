<?php

//require_once CONTROL_PATH . 'Session.php';

class EnlacesModel
{

    public static function enlacesPaginasModelo($modulo, $pagina)
    {
        $cargar = VISTA_PATH;
        $ruta = '';
        if ($modulo != '') {
            $cargar .= 'modulo' . DS . $modulo;
            if ($modulo != 'inicio') {
                $ruta .= '<a href="' . BASE_URL . 'inicio">inicio</a><p>' . $modulo;
            } else {
                $ruta .= '<p>' . $modulo;
            }
        }
        if ($pagina != '') {
            $cargar .= DS . $pagina;
            $ruta .= '</p><p>' . $pagina;
        }
        $cargar .= '.php';
        $ruta .= '</p>';
        $ruta = str_replace('_', ' ', $ruta);
        if (!is_readable($cargar)) {
            $cargar = VISTA_PATH . 'modulo' . DS . 'inicio.php';
            $ruta = '<p>inicio</p>';
            header('Location:' . BASE_URL . 'inicio');
        }
        $enlace = array('pagina' => $cargar, 'ruta' => $ruta);
        return $enlace;
    }
}
